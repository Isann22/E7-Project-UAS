<?php

namespace App\Filament\Resources\TournamentResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\Actions\Action;
use App\Filament\Resources\TournamentResource;

class CreateTournament extends CreateRecord
{
    protected static string $resource = TournamentResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Tournament Created';
    }
}
