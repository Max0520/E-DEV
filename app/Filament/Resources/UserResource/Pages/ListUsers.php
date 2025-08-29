<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    // Désactive complètement le bouton "New"
    protected function canCreate(): bool
    {
        return false;
    }

    // Tu peux supprimer getHeaderActions() si tu n'ajoutes aucune action
}
