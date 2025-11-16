<?php

namespace App\Filament\Admin\Resources\ResepDetailResource\Pages;

use App\Filament\Admin\Resources\ResepDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResepDetail extends EditRecord
{
    protected static string $resource = ResepDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
