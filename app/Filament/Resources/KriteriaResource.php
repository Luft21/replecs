<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KriteriaResource\Pages;
use App\Filament\Resources\KriteriaResource\RelationManagers;
use App\Models\Kriteria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput; // Tambahkan ini
use Filament\Forms\Components\Select;    // Tambahkan ini
use Filament\Forms\Components\Textarea;  // Tambahkan ini
use Filament\Tables\Columns\TextColumn;  // Tambahkan ini
use Filament\Forms\Components\Fieldset; // Tambahkan ini jika ingin mengelompokkan form

class KriteriaResource extends Resource
{
    protected static ?string $model = Kriteria::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal'; // Mengubah ikon navigasi

    protected static ?string $modelLabel = 'Kriteria SPK'; // Mengubah label model
    protected static ?string $pluralModelLabel = 'Daftar Kriteria'; // Mengubah label plural

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Fieldset untuk mengelompokkan input
                Fieldset::make('Informasi Kriteria')
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama Kriteria')
                            ->required()
                            ->maxLength(255),
                        Select::make('jenis')
                            ->label('Jenis Kriteria')
                            ->options([
                                'benefit' => 'Benefit (Semakin Besar, Semakin Baik)',
                                'cost'    => 'Cost (Semakin Kecil, Semakin Baik)',
                            ])
                            ->required(),
                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->nullable()
                            ->rows(3)
                            ->columnSpanFull(), // Membuat textarea memenuhi lebar penuh kolom
                    ])->columns(2), // Atur jumlah kolom dalam fieldset
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Kriteria')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('jenis')
                    ->label('Jenis')
                    ->badge() // Menampilkan sebagai badge untuk visual yang lebih baik
                    ->color(fn (string $state): string => match ($state) {
                        'benefit' => 'success',
                        'cost'    => 'danger',
                        default   => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)) // Kapitalisasi huruf pertama
                    ->sortable(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->toggleable(isToggledHiddenByDefault: true) // Sembunyikan secara default
                    ->limit(50), // Batasi teks yang ditampilkan
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jenis')
                    ->label('Filter Jenis')
                    ->options([
                        'benefit' => 'Benefit',
                        'cost'    => 'Cost',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Tambahkan action hapus individual
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
            // Tambahkan Relation Managers di sini jika ada relasi yang ingin dikelola
            // Contoh: RelationManagers\NilaiKriteriaLaptopRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKriterias::route('/'),
            'create' => Pages\CreateKriteria::route('/create'),
            'edit' => Pages\EditKriteria::route('/{record}/edit'),
        ];
    }

    // Opsi tambahan untuk pencarian global Filament
    public static function getGlobalSearchResultDetails(\Illuminate\Database\Eloquent\Model $record): array
    {
        return [
            'Jenis' => $record->jenis,
        ];
    }
}