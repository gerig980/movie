<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers\CategoryRelationManager;
use App\Filament\Resources\PostResource\RelationManagers\TagsRelationManager;
use App\Filament\Resources\PostResource\RelationManagers\ActorRelationManager;
use App\Filament\Resources\PostResource\Widgets\StatsOverview;
use App\Models\Post;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Card::make()->schema([
                // Select::make('category_id')
                // ->multiple()
                // ->relationship('category', 'name')
                // ->preload(),
                // Select::make('actor_id')
                // ->relationship('actor', 'name'),
                TextInput::make('title')->reactive()
                ->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                })->required(),
                TextInput::make('slug')->required(),
                SpatieMediaLibraryFileUpload::make('thumbnail')->collection('posts'),  
                RichEditor::make('content'),
                TextInput::make('url'),                
                TextInput::make('url2'),                
                TextInput::make('url3'),                
                TextInput::make('url4'),                
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
                TextColumn::make('title')->limit(50)->sortable()->searchable(),
                TextColumn::make('slug')->limit(50),
                TextColumn::make('url')->limit(100),
                TextColumn::make('url2')->limit(100),
                TextColumn::make('url3')->limit(100),
                TextColumn::make('url4')->limit(100),
                SpatieMediaLibraryImageColumn::make('thumbnail')->collection('posts'),  
                IconColumn::make('isPublished')->boolean(),
                IconColumn::make('isBanner')->boolean(),
            ])
            ->filters([
            Filter::make('Published')
            ->query(fn (Builder $query): Builder => $query->where('isPublished', true)),
            Filter::make('Unpublished')
            ->query(fn (Builder $query): Builder => $query->where('isPublished', false)),
            SelectFilter::make('category')->relationship('category', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            TagsRelationManager::class,
            CategoryRelationManager::class,
            ActorRelationManager::class
        ];
    }
    
    public static function getWidgets():array
    {
        return [
            StatsOverview::class
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }    
}
