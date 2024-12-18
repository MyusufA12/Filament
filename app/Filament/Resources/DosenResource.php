<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Dosen;
use App\Models\Matkul;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DosenResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DosenResource\RelationManagers;

class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nidn')
                ->required()
                ->maxLength(10),
            TextInput::make('nama')
                ->required()
                ->maxLength(128),
            Select::make('jenis_kelamin')
                ->options([
                    'L' => 'Laki-Laki',
                    'P' => 'Perempuan',
                ])
                ->required(),
            TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(128),
            TextInput::make('no_hp')
                ->required()
                ->tel()
                ->maxLength(15),
            Select::make('jabatan_akademik')
                ->options([
                    'Asisten' => 'Asisten',
                    'Lektor' => 'Lektor',
                    'Lektor Kepala' => 'Lektor Kepala',
                    'Guru Besar' => 'Guru Besar'
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nidn')->label('NIDN')->sortable()->searchable(),
            TextColumn::make('nama')->label('Nama')->sortable()->searchable(),
            TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
            TextColumn::make('email')->label('Email'),
            TextColumn::make('no_hp')->label('No. HP'),
            TextColumn::make('jabatan_akademik')->label('Jabatan Akademik'),
        ])
        ->filters([
            SelectFilter::make('jenis_kelamin')
                ->options([
                    'L' => 'Laki-Laki',
                    'P' => 'Perempuan'
                ]),
            SelectFilter::make('jabatan_akademik')
                ->options([
                    'Asisten' => 'Asisten',
                    'Lektor' => 'Lektor',
                    'Lektor Kepala' => 'Lektor Kepala',
                    'Guru Besar' => 'Guru Besar'
                ])
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }
    // Tambahkan relasi ini
    public function mataKuliah()
    {
        return $this->hasMany(Matkul::class, 'dosen_id');
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
            'index' => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit' => Pages\EditDosen::route('/{record}/edit'),
        ];
    }
}
