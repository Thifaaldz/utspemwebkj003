<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SupirResource\Pages;
use App\Filament\Admin\Resources\SupirResource\RelationManagers;
use App\Models\Supir;
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


class SupirResource extends Resource
{
    protected static ?string $model = Supir::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->label('Nama Lengkap')->required(),
                TextInput::make('nik')->label('NIK')->required(),
                TextInput::make('telepon')->label('No. Telepon'),
                Textarea::make('alamat')->label('Alamat'),
                TextInput::make('nomor_sim')->label('Nomor SIM'),
                Select::make('jenis_sim')->label('Jenis SIM')->options([
                    'A' => 'SIM A',
                    'B1' => 'SIM B1',
                    'B2' => 'SIM B2',
                ]),
                DatePicker::make('masa_berlaku_sim')->label('Masa Berlaku SIM'),
                DatePicker::make('tanggal_mulai_kerja')->label('Tanggal Mulai Kerja'),
                Select::make('status')->label('Status')->options([
                    'aktif' => 'Aktif',
                    'cuti' => 'Cuti',
                    'nonaktif' => 'Nonaktif',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama Supir'),
                TextColumn::make('nik')->label('NIK'),
                TextColumn::make('nomor_sim')->label('Nomor SIM'),
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
            'index' => Pages\ListSupirs::route('/'),
            'create' => Pages\CreateSupir::route('/create'),
            'edit' => Pages\EditSupir::route('/{record}/edit'),
        ];
    }
}
