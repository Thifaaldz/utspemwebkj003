<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KendaraanResource\Pages;
use App\Filament\Admin\Resources\KendaraanResource\RelationManagers;
use App\Models\Kendaraan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class KendaraanResource extends Resource
{
    protected static ?string $model = Kendaraan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nomor_polisi')->label('Nomor Polisi')->required(),
                TextInput::make('merek')->label('Merek'),
                TextInput::make('tipe')->label('Tipe'),
                TextInput::make('tahun_kendaraan')->label('Tahun'),
                TextInput::make('warna')->label('Warna'),
                Select::make('status_kepemilikan')->label('Status Kepemilikan')->options([
                    'milik_sendiri' => 'Milik Sendiri',
                    'sewa' => 'Sewa',
                ]),
                DatePicker::make('masa_berlaku_stnk')->label('Masa Berlaku STNK'),
                DatePicker::make('masa_berlaku_kir')->label('Masa Berlaku KIR'),
                Select::make('status')->label('Status')->options([
                    'aktif' => 'Aktif',
                    'diperbaiki' => 'Dalam Perbaikan',
                    'rusak' => 'Rusak',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_polisi')->label('Nomor Polisi'),
                TextColumn::make('merek')->label('Merek'),
                TextColumn::make('tipe')->label('Tipe'),
            TextColumn::make('status')->label('Status'),
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
            'index' => Pages\ListKendaraans::route('/'),
            'create' => Pages\CreateKendaraan::route('/create'),
            'edit' => Pages\EditKendaraan::route('/{record}/edit'),
        ];
    }
}
