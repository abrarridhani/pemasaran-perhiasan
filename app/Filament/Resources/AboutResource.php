<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->directory('abouts') // Direktori penyimpanan
                    ->required(),
                TextInput::make('nama')->label('Nama')->required(),
                TextInput::make('nim')->label('NIM')->required(),
                Textarea::make('bio')->label('Bio')->required(),
                TextInput::make('keahlian')->label('Keahlian')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->size(50) // Ukuran thumbnail
                    ->getStateUsing(fn($record) => asset('storage/' . $record->gambar)),
                TextColumn::make('nama')->label('Nama')->searchable(),
                TextColumn::make('nim')->label('NIM'),
                TextColumn::make('bio')->label('Bio')->limit(10),
                TextColumn::make('keahlian')->label('Keahlian')->limit(10),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Tambahkan aksi Delete di sini
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
