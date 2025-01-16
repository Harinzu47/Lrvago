<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use App\Models\Review;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\ReviewResource\Pages;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Orders Management';
    protected static ?string $label = 'Review';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('order_id')
                    ->relationship('order', 'id')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        $order = Order::find($state);
                        $set('user_id', $order?->user_id); // Set user_id berdasarkan order
                    }),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->disabled(), // Nonaktifkan pilihan manual
                TextInput::make('rating')
                    ->numeric()
                    ->rules(['min:1', 'max:5'])
                    ->required(),
                Textarea::make('review')
                    ->required()
                    ->rules(function () {
                        return function ($attribute, $value, $fail) {
                            $order = Order::find(request()->input('order_id'));
                            if (!$order || $order->user_id !== request()->input('user_id')) {
                                $fail('User tidak valid untuk order ini.');
                            }
                        };
                    }),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.id')
                    ->label('Order ID')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable(),
                TextColumn::make('rating')
                    ->sortable(),
                TextColumn::make('review')
                    ->limit(50),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Submitted At'),
            ])
            ->filters([
                SelectFilter::make('rating')
                    ->options([
                        1 => '1 Star',
                        2 => '2 Stars',
                        3 => '3 Stars',
                        4 => '4 Stars',
                        5 => '5 Stars',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
