<?php

namespace App\Filament\Resources\Tag;

use App\Filament\Resources\Tag\TagStationResource\Pages;
use App\Models\Tag\TagStation;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TagStationResource extends Resource
{
    protected static ?string $model = TagStation::class;

    protected static ?string $navigationGroup = '基站';

    protected static ?string $label = '基站';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->columnSpan(2)
                    ->disk('public')
                    ->image()
                    ->label('图片')
                    ->directory('tag'),
                TextInput::make('name')
                    ->label('基站名称')
                    ->required(),
                TextInput::make('code')
                    ->label('设备编号')
                    ->required(),
                TextInput::make('address')
                    ->label('地址')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\RichEditor::make('memo')
                    ->label('备注')
                    ->columnSpan(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('预览'),
                Tables\Columns\TextColumn::make('name')->label('基站名称')->searchable(),
                Tables\Columns\TextColumn::make('code')->label('设备编号')->searchable(),
                Tables\Columns\TextColumn::make('address')->label('地址')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('看附近')
                    ->link(),
                Tables\Actions\ViewAction::make()
                    ->icon(null)
                    ->label('详情')
                    ->form([
                    FileUpload::make('image')
                        ->columnSpan(2)
                        ->disk('public')
                        ->image()
                        ->label('图片')
                        ->directory('tag'),
                    TextInput::make('name')
                        ->label('基站名称')
                        ->required(),
                    TextInput::make('code')
                        ->label('设备编号')
                        ->required(),
                    TextInput::make('address')
                        ->label('地址')
                        ->columnSpan(2)
                        ->required(),
                ]),
                Tables\Actions\EditAction::make(),
            ])
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
            'index' => Pages\ListTagStations::route('/'),
            'create' => Pages\CreateTagStation::route('/create'),
            'edit' => Pages\EditTagStation::route('/{record}/edit'),
        ];
    }
}
