<?php

namespace App\Filament\Resources\QuotationResource\Pages;

use App\Filament\Resources\QuotationResource;
use App\Models\QuotationItem;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Forms;
use Filament\Forms\Form;


class ViewQuotation extends ViewRecord
{

    protected static string $resource = QuotationResource::class;
    
    protected static string $view = 'filament.view-quotation';

    public function getTitle(): string | Htmlable
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


    public function form(Form $form): Form
    { 
        return $form
            ->schema([
                Forms\Components\TextInput::make('email'),
            ]);
    }
    
}
