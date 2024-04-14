<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuotationResource\Pages;
use App\Filament\Resources\QuotationResource\RelationManagers;
use App\Models\Quotation;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;


class QuotationResource extends Resource
{
    protected static ?string $model = Quotation::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('order_status')->options([
                    'Request' => 'Request', 
                    'Send Quotation' => 'Send Quotation', 
                    'Completed' => 'Completed'
                ])->required(),
                TextInput::make('name')->required(),
                TextInput::make('company'),
                TextInput::make('email')->required(),
                TextInput::make('phone')->required(),
                // TextInput::make('address_1'),
                // TextInput::make('address_2'),
                Textarea::make('message'),
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('status', 'unread')->count();
        return empty( $count ) ? null : $count;
    }


    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')->weight(fn($record)=> $record->status =='unread' ? 'bold' : ''),
                TextColumn::make('company')->weight(fn($record)=> $record->status =='unread' ? 'bold' : ''),
                TextColumn::make('email')->weight(fn($record)=> $record->status =='unread' ? 'bold' : ''),
                TextColumn::make('phone')->weight(fn($record)=> $record->status =='unread' ? 'bold' : ''),
                TextColumn::make('order_status')->weight(fn($record)=> $record->status =='unread' ? 'bold' : ''),
            ])
            ->filters([ 
                SelectFilter::make('order_status')
                    ->options([
                        'Request' => 'Request', 
                        'Send Quotation' => 'Send Quotation', 
                        'Completed' => 'Completed'
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            RelationManagers\QuotationItemsRelationManager::class

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuotations::route('/'),
            // 'create' => Pages\CreateQuotation::route('/create'),
            'edit' => Pages\EditQuotation::route('/{record}/edit'),
            // 'view' => Pages\ViewQuotation::route('/{record}'),
        ];
    }
}
