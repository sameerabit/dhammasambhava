<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Filament\Resources\MediaResource\RelationManagers;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('file_path')
                    ->label('Upload Image / Video')
                    ->image()
                    ->acceptedFileTypes(['image/*', 'video/*'])
                    ->columnSpanFull()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('type', 'image');
                            $set('is_published', true);
                        }
                    })
                    ->live(),
                Forms\Components\TextInput::make('youtube_url')
                    ->label('Or paste YouTube URL')
                    ->url()
                    ->columnSpanFull()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('type', 'youtube');
                            $set('is_published', true);
                        }
                    })
                    ->live(),
                Forms\Components\TextInput::make('title')
                    ->columnSpanFull(),
                Forms\Components\Hidden::make('type')->default('image'),
                Forms\Components\Hidden::make('category')->default('general'),
                Forms\Components\Hidden::make('is_published')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->getStateUsing(fn ($record) => $record->title ?: $record->file_path)
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_path')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('youtube_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('display_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
}
