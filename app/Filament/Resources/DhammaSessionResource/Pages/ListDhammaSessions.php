<?php

namespace App\Filament\Resources\DhammaSessionResource\Pages;

use App\Filament\Resources\DhammaSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDhammaSessions extends ListRecords
{
    protected static string $resource = DhammaSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
