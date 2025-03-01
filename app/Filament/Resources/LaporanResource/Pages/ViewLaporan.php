<?php

namespace App\Filament\Resources\LaporanResource\Pages;

use Filament\Pages\Actions;
use Filament\Forms\Components\Section;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\LaporanResource;

class ViewLaporan extends ViewRecord
{
    protected static string $resource = LaporanResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            Section::make('Laporan PDF')
                ->schema([
                    \Filament\Forms\Components\Placeholder::make('pdf_viewer')
                        ->content(fn ($record) => view('filament.laporan.pdf-view', ['record' => $record])),
                ]),
        ];
    }
}
