<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('description')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('price')
                ->required()
                ->numeric()
                ->prefix('Rp')
                ->maxValue(42949672.95),
                FileUpload::make('image')
                ->required()
                ->image(),
                Forms\Components\Select::make('new_arrival')
                ->required()
                ->options([
                    0 => 'No',
                    1 => 'Yes',
                ]),
                Forms\Components\Select::make('best_selling')
                ->required()
                ->options([
                    0 => 'No',
                    1 => 'Yes',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('new_arrival')
                    ->icon(fn ($state) => match ($state) {
                        0 => 'heroicon-o-x-circle',
                        1 => 'heroicon-o-check-circle',
                    }),
                Tables\Columns\IconColumn::make('best_selling')
                    ->icon(fn ($state) => match ($state) {
                        0 => 'heroicon-o-x-circle',
                        1 => 'heroicon-o-check-circle',
                    }),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
