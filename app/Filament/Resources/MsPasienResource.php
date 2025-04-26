<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MsPasienResource\Pages;
use App\Filament\Resources\MsPasienResource\RelationManagers;
use App\Models\MsPasien;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MsPasienResource extends Resource
{
    protected static ?string $model = MsPasien::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-group';
    protected static ?string $pluralModelLabel = 'Master Pasien';
    protected static ?string $navigationGroup = 'Master data';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = "Data Pasien";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nik')
                    ->placeholder('Egs: 1234567890')
                    ->required()
                    ->unique()
                    ->maxLength(10),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('jenis_kelamin')
                    ->required()
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ]),
                Forms\Components\TextInput::make('no_hp')
                    ->maxLength(15),
                Forms\Components\Textarea::make('alamat')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tgl_lahir')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->searchable()
            ->columns([
                TextColumn::make('nik')->label('NIK')->default('-'),
                TextColumn::make('nama')->label('Nama Pasien'),
                TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                TextColumn::make('created_at')->label('Tanggal Dibuat'),
                TextColumn::make('updated_at')->label('Tanggal Diubah'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListMsPasiens::route('/'),
            'create' => Pages\CreateMsPasien::route('/create'),
            'edit' => Pages\EditMsPasien::route('/{record}/edit'),
            'view' => Pages\ViewMsPasien::route('/{record}'),
        ];
    }
}
