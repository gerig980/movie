<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\CategoryResource\RelationManagers;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Card::make()->schema([
                // Select::make('category_id')
                // ->multiple()
                // ->relationship('category', 'name'),
                // Select::make('actor_id')
                // ->relationship('actor', 'name'),
                TextInput::make('title')->reactive()
                ->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                })->required(),
                TextInput::make('slug')->required(),
                TextInput::make('url')->required(),
                TextInput::make('url2'),
                TextInput::make('url3'),
                TextInput::make('url4'),
                SpatieMediaLibraryFileUpload::make('thumbnail')->collection('posts'),
                RichEditor::make('content'),
                Toggle::make('isPublished'),
                Toggle::make('isBanner')
            ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('title')->limit(50)->sortable(),
            TextColumn::make('slug')->limit(50),
            TextColumn::make('url')->limit(100),
            TextColumn::make('url2')->limit(100),
            TextColumn::make('url3')->limit(100),
            TextColumn::make('url4')->limit(100),
            SpatieMediaLibraryImageColumn::make('thumbnail')->collection('posts'),
            IconColumn::make('isPublished')->boolean(),
            IconColumn::make('isBanner')->boolean()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
