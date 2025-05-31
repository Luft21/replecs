<?php

namespace App\Filament\Resources\AlternatifScoreResource\Pages;

use App\Filament\Resources\AlternatifScoreResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlternatifScore extends EditRecord
{
    protected static string $resource = AlternatifScoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
