<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'address';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('last_name') 
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('phone')
                    ->required()
                    ->tel()
                    ->maxLength(15),
                
                TextInput::make('city')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kelurahan')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('kecamatan')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('kode_pos')
                    ->required()
                    ->numeric()
                    ->maxLength(10),
                
                Textarea::make('street_adress')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('street_adress')
            ->columns([
                TextColumn::make('full_name')
                    ->label('Full Name'),
                    
                TextColumn::make('phone'),
                TextColumn::make('city'),
                TextColumn::make('kelurahan'),
                TextColumn::make('kecamatan'),
                TextColumn::make('kode_pos'),
                TextColumn::make('street_adress'),
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
