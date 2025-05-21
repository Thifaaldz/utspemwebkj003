<?php

namespace App\Filament\Admin\Resources;

use App\Models\PenugasanSupir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

// Perbaikan: gunakan Pages yang benar untuk resource ini
use App\Filament\Admin\Resources\PenugasanSupirResource\Pages;

class PenugasanSupirResource extends Resource
{
    protected static ?string $model = PenugasanSupir::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('supir_id')
                    ->label('Supir')
                    ->relationship('supir', 'nama')
                    ->searchable()
                    ->required(),

                Select::make('kendaraan_id')
                    ->label('Kendaraan')
                    ->relationship('kendaraan', 'nomor_polisi')
                    ->searchable()
                    ->required(),

                DatePicker::make('tanggal_penugasan')
                    ->label('Tanggal Penugasan')
                    ->required(),

                Textarea::make('catatan')
                    ->label('Catatan Tambahan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('supir.nama')->label('Nama Supir'),
                TextColumn::make('kendaraan.nomor_polisi')->label('Nomor Polisi'),
                TextColumn::make('tanggal_penugasan')->label('Tanggal Penugasan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenugasanSupirs::route('/'),
            'create' => Pages\CreatePenugasanSupir::route('/create'),
            'edit' => Pages\EditPenugasanSupir::route('/{record}/edit'),
        ];
    }
}
