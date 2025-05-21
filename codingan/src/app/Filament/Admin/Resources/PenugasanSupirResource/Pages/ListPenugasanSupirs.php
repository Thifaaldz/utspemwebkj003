<?php

namespace App\Filament\Admin\Resources\PenugasanSupirResource\Pages;

use App\Filament\Admin\Resources\PenugasanSupirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenugasanSupirs extends ListRecords
{
    protected static string $resource = PenugasanSupirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
