<?php

namespace App\Filament\Resources\Tag;

use App\Enum\TagBind\TagBindProtectEnum;
use App\Enum\TagBind\TagBindWarnEnum;
use App\Filament\Component\ReImageColumn;
use App\Filament\Resources\Tag\TagBindResource\Pages;
use App\Models\Tag\TagBind;
use Exception;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;

class TagBindResource extends Resource
{
    protected static ?string $model = TagBind::class;

    protected static ?string $navigationGroup = '基站';

    protected static ?string $label = '标签';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('基础信息')
                            ->schema([
                                FileUpload::make('image')
                                    ->columnSpan(2)
                                    ->disk('public')
                                    ->image()
                                    ->label('图片')
                                    ->directory('tag'),
                                TextInput::make('name')
                                    ->label('标签名称')
                                    ->required(),
                                TextInput::make('code')
                                    ->label('标签编号')
                                    ->required(),
                                Forms\Components\RichEditor::make('memo')
                                    ->label('备注')
                                    ->columnSpan(2),
                            ]),
                    ])
                    ->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('功能支持')
                            ->schema([
                                Forms\Components\Radio::make('warn')
                                    ->label('是否支持啸叫')
                                    ->options(TagBindWarnEnum::class)
                                    ->required(),
                                Forms\Components\Select::make('protect')
                                    ->label('防拆防爆')
                                    ->options(TagBindProtectEnum::class)
                                    ->required(),
                            ]),
                    ]),
            ])->columns(3);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ReImageColumn::make('image')->label('预览'),
                Tables\Columns\TextColumn::make('name')
                    ->label('标签名称')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('code')
                    ->label('标签编号')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('warn')->label('是否支持啸叫')->badge(),
                Tables\Columns\TextColumn::make('protect')->label('防拆防爆'),
            ])
            ->filtersFormColumns(2)
            ->filters([
                SelectFilter::make('warn')
                    ->label('是否支持啸叫')
                    ->options(TagBindWarnEnum::class),
                SelectFilter::make('protect')
                    ->label('防拆防爆')
                    ->options(TagBindProtectEnum::class),
            ], layout: FiltersLayout::AboveContentCollapsible)
            ->actions([
                Tables\Actions\Action::make('看轨迹')
                    ->modalSubmitAction(false)
                    ->modalContent(fn ($record): Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application => view(
                        'filament.resources.tag.tag-bind-resource.tag-track',
                        ['tagCode' => $record->code],
                    ))
                    ->link(),
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
            'index' => Pages\ListTagBinds::route('/'),
            'create' => Pages\CreateTagBind::route('/create'),
            'edit' => Pages\EditTagBind::route('/{record}/edit'),
        ];
    }
}
