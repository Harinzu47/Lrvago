<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Payment;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\PaymentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PaymentResource\RelationManagers;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Financial Management';
    protected static ?string $navigationLabel = 'Payments';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('order_id')
                    ->label('Order ID')
                    ->required()
                    ->numeric(),

                TextInput::make('amount')
                    ->label('Amount')
                    ->required()
                    ->numeric()
                    ->disabled(fn ($record) => $record !== null), // Mengunci saat edit

                Select::make('method')
                    ->label('Payment Method')
                    ->options([
                        'cod' => 'Cash On Delivery',
                        'midtrans' => 'Midtrans',
                    ])
                    ->required(),

                Select::make('status')
                    ->label('Payment Status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                    ])
                    ->required(),

                DateTimePicker::make('payment_date')
                    ->label('Payment Date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('order_id')->label('Order ID')->sortable(),
                TextColumn::make('amount')
                    ->label('Amount')
                    ->money('IDR', true), // Format mata uang IDR
                TextColumn::make('method')->label('Payment Method'),
                BadgeColumn::make('status')
                    ->label('Payment Status')
                    ->colors([
                        'primary' => 'pending',
                        'success' => 'completed',
                        'danger' => 'failed',
                    ]),
                TextColumn::make('payment_date')
                    ->label('Payment Date')
                    ->dateTime(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                    ]),
                Filter::make('payment_date')
                    ->label('Payment Date')
                    ->form([
                        Forms\Components\DatePicker::make('payment_date_from')->label('From'),
                        Forms\Components\DatePicker::make('payment_date_to')->label('To'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when($data['payment_date_from'], fn ($query, $date) => $query->whereDate('payment_date', '>=', $date))
                            ->when($data['payment_date_to'], fn ($query, $date) => $query->whereDate('payment_date', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn ($record) => $record->status !== 'completed'),
                
                Tables\Actions\DeleteAction::make()
                    ->visible(fn ($record) => $record->status !== 'completed'), 
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
