<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Barang')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->required(),
                Forms\Components\TextInput::make('cost')
                    ->label('Harga Sewa')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('location')
                    ->label('Lokasi')
                    ->required(),
                Forms\Components\TextInput::make('category')
                    ->label('Kategori')
                    ->required(),
                Forms\Components\TextInput::make('stock')
                    ->label('Stok')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('condition')
                    ->label('Kondisi')
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->label('Link')
                    ->url()
                    ->required(),
                Forms\Components\FileUpload::make('image_path')
                    ->label('Gambar')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Barang')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50),
                Tables\Columns\TextColumn::make('cost')
                    ->label('Harga')
                    ->money('IDR', true),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi'),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori'),
                Tables\Columns\TextColumn::make('stock')
                    ->label('Stok'),
                Tables\Columns\TextColumn::make('condition')
                    ->label('Kondisi'),
                Tables\Columns\TextColumn::make('link')
                    ->label('Link')
                    ->url(fn ($record) => $record->link),
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Gambar'),
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
