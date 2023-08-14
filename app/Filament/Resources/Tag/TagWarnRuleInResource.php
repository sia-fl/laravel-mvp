<?php

namespace App\Filament\Resources\Tag;

use App\Filament\Component\ReImageColumn;
use App\Filament\Resources\Tag\TagWarnRuleInResource\Pages;
use App\Filament\Resources\Tag\TagWarnRuleInResource\RelationManagers;
use App\Models\Tag\TagBind;
use App\Models\Tag\TagStation;
use App\Models\Tag\TagWarnRuleIn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;

class TagWarnRuleInResource extends Resource
{
    protected static ?string $model = TagWarnRuleIn::class;

    protected static ?string $navigationGroup = '告警';

    protected static ?string $label = '告警规则';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tag_bind_code')
                    ->label('标签编号')
                    ->searchable()
                    ->options(TagBind::query()->get()->pluck('name', 'code')->toArray())
                    ->placeholder('请选择标签编号')
                    ->required(),
                Forms\Components\Select::make('tag_station_code')
                    ->label('基站编号')
                    ->searchable()
                    ->options(TagStation::query()->get()->pluck('name', 'code')->toArray())
                    ->placeholder('请选择基站编号')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ReImageColumn::make('tagBind.image')
                    ->label('标签预览'),
                TextColumn::make('tag_bind_code')
                    ->label('标签编号')
                    ->copyable()
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('tagBind.name')
                    ->label('标签名称')
                    ->copyable()
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->searchable(isIndividual: true, isGlobal: false),
                ReImageColumn::make('tagStation.image')
                    ->label('基站预览'),
                TextColumn::make('tag_station_code')
                    ->label('基站编号')
                    ->copyable()
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('tagStation.name')
                    ->label('基站名称')
                    ->copyable()
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('created_at')
                    ->label('创建时间'),
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
            RelationManagers\WarnTargetsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTagWarnRuleIns::route('/'),
            'create' => Pages\CreateTagWarnRuleIn::route('/create'),
            'edit' => Pages\EditTagWarnRuleIn::route('/{record}/edit'),
        ];
    }
}