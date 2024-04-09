<?php

namespace App\Filament\Resources\QuotationResource\Pages;

use App\Filament\Resources\QuotationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuotation extends EditRecord
{
    protected static string $resource = QuotationResource::class;

    protected static string $view = 'filament.edit-quotation';

    public function getTitle(): string 
    {
        $this->record->status = 'read';
        $this->record->save();

        if (filled(static::$title)) {
            return static::$title;
        }

        return __('filament-panels::resources/pages/view-record.title', [
            'label' => $this->getRecordTitle(),
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
