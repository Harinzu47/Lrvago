<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (in_array($data['status'], ['shipped', 'delivered'])) {
            Notification::make()
                ->title('Order tidak dapat diedit!')
                ->danger()
                ->send();

            abort(403, 'Anda tidak dapat mengedit pesanan dengan status ini.');
        }

        return $data;
    }
}
