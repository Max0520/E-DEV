<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Formulaire public
    public function showForm()
    {
        return view('contact');
    }

    // Enregistrement du message public
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'project' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\Contact::create($request->all());

        return redirect()->route('contact.form')
                         ->with('success', 'Votre message a été envoyé avec succès !');
    }

    // Admin : détail
    public function show(Contact $contact)
    {
        // Vue Blade complète
        return view('admin.contacts.show', compact('contact'));
    }

    // Admin : répondre (email sortant)
    public function reply(Request $request, Contact $contact)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        // Envoi email
        Mail::raw($request->reply_message, function ($message) use ($contact) {
            $message->to($contact->email)
                ->subject('Réponse à votre message');
        });

        // Enregistrer aussi côté DB (fil de discussion)
        $contact->replies()->create([
            'message' => $request->reply_message,
            'sender'  => 'admin',
        ]);

        return back()->with('success', 'Réponse envoyée avec succès !');
    }

    // 🔴 JSON : retourne toutes les replies (admin + client) par ordre chronologique
    public function getReplies(Contact $contact)
    {
        $replies = $contact->replies()
            ->orderBy('created_at', 'asc')
            ->get(['id', 'message', 'sender', 'created_at']);

        return response()->json([
            'contact' => [
                'id'        => $contact->id,
                'message'   => $contact->message,
                'created_at'=> $contact->created_at,
            ],
            'replies' => $replies,
        ]);
    }
}
