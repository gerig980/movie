<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActorsResource\Pages;
use App\Filament\Resources\ActorsResource\RelationManagers;
use App\Models\Actors;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActorsResource extends Resource
{
    protected static ?string $model = Actors::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Card::make()->schema([
                TextInput::make('name')->required()              
            ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('name')->limit(50)->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\PostsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActors::route('/'),
            'create' => Pages\CreateActors::route('/create'),
            'view' => Pages\ViewActors::route('/{record}'),
            'edit' => Pages\EditActors::route('/{record}/edit'),
        ];
    }    
}
