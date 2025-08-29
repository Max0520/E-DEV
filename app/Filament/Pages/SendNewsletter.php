<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Mail;
use App\Models\Newsletter;
use App\Mail\NewsletterBroadcastMail;
use Filament\Notifications\Notification;

class SendNewsletter extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static string $view = 'filament.pages.send-newsletter';
    protected static ?string $navigationLabel = 'Envoyer Newsletter';
    protected static ?string $title = 'Envoyer une Newsletter';
    protected static ?string $navigationGroup = 'Communication';

    public string $subject = '';
    public string $message = '';

    // Définition du formulaire
    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject')
                    ->label('Sujet')
                    ->required(),

                Forms\Components\Textarea::make('message')
                    ->label('Message')
                    ->required()
                    ->rows(6),
            ]);
    }

    // Méthode pour envoyer la newsletter
    public function send(): void
    {
        $subscribers = Newsletter::pluck('email');

        foreach ($subscribers as $email) {
            try {
                Mail::to($email)->send(new NewsletterBroadcastMail($this->subject, $this->message));
            } catch (\Exception $e) {
                \Log::error("Erreur envoi newsletter à {$email} : " . $e->getMessage());
            }
        }

        // Notification Filament
        Notification::make()
            ->title('Newsletter envoyée avec succès à tous les abonnés ✅')
            ->success()
            ->send();

        $this->reset(['subject', 'message']);
    }
}
