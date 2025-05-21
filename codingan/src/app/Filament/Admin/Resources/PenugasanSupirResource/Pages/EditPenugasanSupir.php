<?php

namespace App\Filament\Admin\Resources\PenugasanSupirResource\Pages;

use App\Filament\Admin\Resources\PenugasanSupirResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenugasanSupir extends EditRecord
{
    protected static string $resource = PenugasanSupirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
