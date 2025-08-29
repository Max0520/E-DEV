<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    // Si tu veux, tu peux désactiver l'édition depuis cette page
    protected function canEdit(): bool
    {
        return false;
    }
}
