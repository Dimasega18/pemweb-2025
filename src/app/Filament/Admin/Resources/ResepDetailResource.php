<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ResepDetailResource\Pages;
use App\Filament\Admin\Resources\ResepDetailResource\RelationManagers;
use App\Models\ResepDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResepDetailResource extends Resource
{
    protected static ?string $model = ResepDetail::class;

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
                //
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
            'index' => Pages\ListResepDetails::route('/'),
            'create' => Pages\CreateResepDetail::route('/create'),
            'edit' => Pages\EditResepDetail::route('/{record}/edit'),
        ];
    }
}
