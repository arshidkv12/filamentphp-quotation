<?php

namespace App\Filament\Resources\QuotationResource\RelationManagers;

use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Filament\Tables\Columns\Layout\Split;


class QuotationItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'quotationItems';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    { 
        return $form
            ->schema([
                Forms\Components\Select::make('name')
                    ->label('Product')
                    ->options(Product::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->live()
                    ->dehydrated(false)
                    ->afterStateUpdated(function (Set $set, ?string $state) { 
                        $product = Product::find( $state );
                        $set('name', $product->name);
                        $set('product_id', $state);
                    }),

                Forms\Components\Hidden::make('name')->required(),
                Forms\Components\Hidden::make('product_id'),
                Forms\Components\TextInput::make('price')->numeric(),
                Forms\Components\TextInput::make('qty')->numeric()->required(),
            ]);
    }

    

    public function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('product.unit')->label('Unit'),
                Tables\Columns\TextInputColumn::make('price')->label('Unit price')->afterStateUpdated(function (RelationManager $livewire){
                    $livewire->dispatch('quoteUpdated');
                }),
                Tables\Columns\TextInputColumn::make('qty')->afterStateUpdated(function (RelationManager $livewire){
                    $livewire->dispatch('quoteUpdated');
                }),
                Tables\Columns\TextColumn::make('total_price')->getStateUsing(function($record) {
                    return $record->qty * $record->price;
                })->numeric(2)->label('Price'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label('Add Item'),
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
