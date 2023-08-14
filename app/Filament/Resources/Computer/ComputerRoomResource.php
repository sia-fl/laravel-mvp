<?php

namespace App\Filament\Resources\Computer;

use App\Filament\Component\ReImageColumn;
use App\Filament\Resources\Computer\ComputerRoomResource\Pages;
use App\Models\Computer\ComputerRoom;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ComputerRoomResource extends Resource
{
    protected static ?string $model = ComputerRoom::class;

    protected static ?string $navigationGroup = '资产管理';

    protected static ?string $label = '机房';

    protected static ?string $navigationIcon = 'heroicon-o-server-stack';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->getUploadedFileNameForStorageUsing(fn(TemporaryUploadedFile $file): string => str(Str::random(40)) . '.' . $file->getClientOriginalExtension())
                    ->columnSpan(2)
                    ->disk('public')
                    ->image()
                    ->label('图片')
                    ->directory('computer'),
                TextInput::make('name')
                    ->label('机房名称')
                    ->required(),
                TextInput::make('code')
                    ->label('机房编号')
                    ->required(),
                RichEditor::make('memo')
                    ->label('备注')
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ReImageColumn::make('image')
                    ->label('预览')->size('50px'),
                Tables\Columns\TextColumn::make('name')
                    ->label('机房名称')
                    ->searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn::make('code')
                    ->label('机房编号')
                    ->searchable(isIndividual: true, isGlobal: false),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])->actionsPosition(ActionsPosition::BeforeCells)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListComputerRooms::route('/'),
            'create' => Pages\CreateComputerRoom::route('/create'),
            'edit' => Pages\EditComputerRoom::route('/{record}/edit'),
        ];
    }
}
