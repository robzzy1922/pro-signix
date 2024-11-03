<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ormawa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\OrmawaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrmawaResource\Pages\EditOrmawa;
use App\Filament\Resources\OrmawaResource\RelationManagers;
use App\Filament\Resources\OrmawaResource\Pages\ListOrmawas;
use App\Filament\Resources\OrmawaResource\Pages\CreateOrmawa;

class OrmawaResource extends Resource
{
    protected static ?string $model = Ormawa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Tambah Ormawa';

    protected static ?string $modelLabel = 'Ormawa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Ormawa Information')
                    ->schema([
                        TextInput::make('nim')->required()->unique(ignorable: fn ($record) => $record),
                        TextInput::make('nama')->required(),
                        TextInput::make('email')->required(),
                        Select::make('ormawa')->options([
                            'FORMADIKSI' => 'FORMADIKSI',
                            'HIMATIF' => 'HIMATIF',
                            'HIMA-RPL' => 'HIMA-RPL',
                            'HIMAKES' => 'HIMAKES'
                        ]),
                        TextInput::make(name: 'password')
                            ->required()
                            ->password()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')->sortable()->searchable(),
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('ormawa')->sortable()->searchable(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrmawas::route('/'),
            'create' => Pages\CreateOrmawa::route('/create'),
            'edit' => Pages\EditOrmawa::route('/{record}/edit'),
        ];
    }
}