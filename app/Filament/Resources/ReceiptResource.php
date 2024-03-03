<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReceiptResource\Pages;
use App\Models\Receipt;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ReceiptResource extends Resource
{
    protected static ?string $model = Receipt::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {




        return $table
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('receipt_id'),
                TextColumn::make('CfdiType'),
                TextColumn::make('Type'),
                TextColumn::make('Serie'),
                TextColumn::make('Folio'),
                TextColumn::make('receipt_id'),
                TextColumn::make('Date'),
                TextColumn::make('Status')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        //'draft' => 'gray',
                        //'reviewing' => 'warning',
                        //'rejected' => 'danger',
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReceipts::route('/'),
            'create' => Pages\CreateReceipt::route('/create'),
            'edit' => Pages\EditReceipt::route('/{record}/edit'),
        ];
    }
}
