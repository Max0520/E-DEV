<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Webklex\IMAP\Facades\Client;
use App\Models\Contact;
use App\Models\ContactReply;

class FetchContactReplies extends Command
{
    protected $signature = 'contacts:fetch-replies';
    protected $description = 'Récupère les emails entrants des clients et garde uniquement leur dernier message';

    public function handle()
    {
        $client = Client::account('default');
        $client->connect();

        $folder = $client->getFolder('INBOX');
        $messages = $folder->messages()->unseen()->get();

        foreach ($messages as $message) {
            $email_from = $message->getFrom()[0]->mail;
            $body = $message->getTextBody() ?? $message->getHTMLBody();
            $body = strip_tags($body);

            // Extraire le vrai texte du client
            $lines = array_reverse(explode("\n", $body));
            $clean_lines = [];
            foreach ($lines as $line) {
                $line_trim = trim($line);
                if (empty($line_trim) || str_starts_with($line_trim, '>') || preg_match('/Le .* a écrit :/', $line_trim)) {
                    continue;
                }
                $clean_lines[] = $line_trim;
            }
            $body_clean = implode("\n", array_reverse($clean_lines));

            $contact = Contact::where('email', $email_from)->latest()->first();

            if ($contact && !empty($body_clean)) {
                ContactReply::create([
                    'contact_id' => $contact->id,
                    'message' => $body_clean,
                    'sender' => 'client',
                ]);
            }

            $message->setFlag('Seen');
        }
    }
}
