<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Mail\NewsletterWelcomeMail;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        // Sauvegarde
        $newsletter = Newsletter::create([
            'email' => $request->email,
        ]);

        // Envoi de l'email de bienvenue
        Mail::to($newsletter->email)->send(new NewsletterWelcomeMail($newsletter->email));

        // Notification de succès
        return back()->with('success', 'Merci pour votre inscription à la newsletter ✅ Vérifiez votre email !');
    }
}
