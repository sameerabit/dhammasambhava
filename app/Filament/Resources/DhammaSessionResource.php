<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DhammaSessionResource\Pages;
use App\Filament\Resources\DhammaSessionResource\RelationManagers;
use App\Models\DhammaSession;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DhammaSessionResource extends Resource
{
    protected static ?string $model = DhammaSession::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->required()
                    ->options([
                        'dhamma' => 'Dhamma',
                        'yoga' => 'Yoga',
                        'both' => 'Both',
                    ]),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('duration')
                    ->label('Duration')
                    ->required()
                    ->numeric()
                    ->suffix('hour(s)')
                    ->helperText('Enter duration in hours (e.g. 1.5 for 1 hour 30 minutes)')
                    ->afterStateHydrated(fn ($state, $set) => $set('duration', $state ? $state / 60 : null))
                    ->dehydrateStateUsing(fn ($state) => $state ? (int) round($state * 60) : null),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('Rs.'),
                Forms\Components\TextInput::make('max_capacity')
                    ->numeric(),
                Forms\Components\TextInput::make('location')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
                Forms\Components\FileUpload::make('image_path')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('duration')
                    ->formatStateUsing(fn ($state) => $state ? rtrim(rtrim(number_format($state / 60, 2), '0'), '.') . ' hour(s)' : '-')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('LKR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_capacity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\ImageColumn::make('image_path'),
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
            'index' => Pages\ListDhammaSessions::route('/'),
            'create' => Pages\CreateDhammaSession::route('/create'),
            'edit' => Pages\EditDhammaSession::route('/{record}/edit'),
        ];
    }
}
