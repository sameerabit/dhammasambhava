<?php

namespace App\Filament\Resources\DhammaSessionResource\Pages;

use App\Filament\Resources\DhammaSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDhammaSession extends EditRecord
{
    protected static string $resource = DhammaSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
