<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Laporan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\LaporanResource\Pages;

class LaporanResource extends Resource
{
    protected static ?string $model = Laporan::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Laporan Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Upload file PDF
                Forms\Components\FileUpload::make('file_path')
                    ->label('Upload Laporan (PDF)')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('laporans')
                    ->preserveFilenames(),

                // Status laporan (default: pending)
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'validated' => 'Validated',
                    ])
                    ->default('pending')
                    ->disabled(), // Tidak bisa diubah saat upload
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('file_path')
                    ->label('File Laporan')
                    ->searchable(),

                // Status laporan dengan warna badge
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => $state === 'pending' ? 'warning' : 'success')
                    ->label('Status'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Filter berdasarkan status laporan
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'validated' => 'Validated',
                    ]),
            ])
            ->actions([
                // Lihat detail laporan (semua user bisa)
                Tables\Actions\ViewAction::make(),

                // Edit laporan (hanya admin_penjualan & hanya jika pending)
                Tables\Actions\EditAction::make()
                    ->visible(fn ($record) => \Illuminate\Support\Facades\Gate::allows('update', $record) ?? false),

                // Validasi laporan (hanya owner)
                Tables\Actions\Action::make('validate')
                    ->label('Validate')
                    ->icon('heroicon-o-check-circle')
                    ->action(fn ($record) => $record->update(['status' => 'validated']))
                    ->visible(fn ($record) => \Illuminate\Support\Facades\Gate::allows('validate', $record)),
                Tables\Actions\Action::make('download')
                    ->label('Download')
                    ->url(fn ($record) => Storage::url('laporans/' . basename($record->file_path)))
                    ->openUrlInNewTab()
                    ->visible(fn ($record) => \Illuminate\Support\Facades\Gate::allows('download', $record)), // Pakai Policy
                Tables\Actions\DeleteAction::make()
                    ->visible(false),
            ])
            ->bulkActions([
                // Bulk delete dinonaktifkan
                Tables\Actions\DeleteBulkAction::make()
                    ->visible(false),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporans::route('/'),
            'create' => Pages\CreateLaporan::route('/create'),
            'edit' => Pages\EditLaporan::route('/{record}/edit'),
        ];
    }
}
