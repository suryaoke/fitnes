<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscribePackageResource\Pages;
use App\Filament\Resources\SubscribePackageResource\RelationManagers;
use App\Models\SubscribePackage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscribePackageResource extends Resource
{
    protected static ?string $model = SubscribePackage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('icon')
                    ->image()
                    ->required(),

                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),

                TextInput::make('duration')
                    ->required()
                    ->numeric()
                    ->prefix('Days'),

                Repeater::make('subcribeBenefits')
                    ->relationship('subcribeBenefits')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                    ]),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->money('IDR', true),

                Tables\Columns\ImageColumn::make('icon'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListSubscribePackages::route('/'),
            'create' => Pages\CreateSubscribePackage::route('/create'),
            'edit' => Pages\EditSubscribePackage::route('/{record}/edit'),
        ];
    }
}
