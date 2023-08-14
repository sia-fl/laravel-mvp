<?php

namespace App\Filament\Resources\Computer;

use App\Enum\Computer\ComputerStateEnum;
use App\Enum\Computer\ComputerSystemEnum;
use App\Filament\Component\ReImageColumn;
use App\Filament\Resources\Computer\ComputerResource\Pages;
use App\Models\Computer\Computer;
use App\Models\Computer\ComputerRoom;
use Exception;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ComputerResource extends Resource
{
    protected static ?string $model = Computer::class;

    protected static ?string $slug = 'computer/computers';

    protected static ?string $navigationIcon = 'heroicon-o-server-stack';

    protected static ?string $navigationGroup = '资产管理';

    protected static ?string $label = '电脑服务器';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Group::make()
                    ->columnSpan(2)
                    ->schema([
                        Section::make('基础信息')
                            ->columnSpan(2)
                            ->schema([
                                FileUpload::make('image')
                                    ->getUploadedFileNameForStorageUsing(fn(TemporaryUploadedFile $file): string => str(\Illuminate\Support\Str::random(40)) . '.' . $file->getClientOriginalExtension())
                                    ->columnSpan(2)
                                    ->disk('public')
                                    ->image()
                                    ->label('图片预览')
                                    ->directory('computer'),
                                Select::make('computed_room_code')
                                    ->label('电脑所在机房')
                                    ->columnSpan(1)
                                    ->options(ComputerRoom::query()->get()->pluck('name', 'code'))
                                    ->required(),
                                Select::make('state')
                                    ->columnSpan(1)
                                    ->label('使用状态')
                                    ->options(ComputerStateEnum::class)
                                    ->required(),
                                TextInput::make('code')
                                    ->label('电脑编号')
                                    ->required(),
                                TextInput::make('model')
                                    ->label('电脑型号')
                                    ->required(),
                                RichEditor::make('memo')
                                    ->label('备注')
                                    ->columnSpan(2),
                            ]),
                    ]),
                Group::make()
                    ->schema([
                        Section::make('配置')
                            ->schema([
                                TextInput::make('motherboard')
                                    ->label('主板')
                                    ->required(),
                                TextInput::make('cpu')
                                    ->label('CPU')
                                    ->required(),
                                TextInput::make('memory')
                                    ->label('内存')
                                    ->required(),
                                TextInput::make('graphics')
                                    ->label('显卡')
                                    ->required(),
                                TextInput::make('disk')
                                    ->label('硬盘')
                                    ->required(),
                            ]),
                        Section::make('系统')
                            ->schema([
                                Select::make('os')
                                    ->options(ComputerSystemEnum::class)
                                    ->required(),
                                TextInput::make('ip')
                                    ->label('IP')
                                    ->ipv4()
                                    ->required(),
                            ])
                    ]),
            ]);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ReImageColumn::make('image')->label('预览')->size('50px'),
                TextColumn::make('room.name')->label('电脑所在机房')->copyable(),
                TextColumn::make('state')->label('使用状态')->badge(),
                TextColumn::make('code')
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->label('电脑编号')
                    ->copyable()
                    ->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('cpu')
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->label('CPU')
                    ->copyable()
                    ->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('memory')
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->label('内存')
                    ->copyable()
                    ->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('model')
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->label('电脑型号')
                    ->copyable()
                    ->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('graphics')
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->label('显卡')
                    ->copyable()
                    ->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('os')
                    ->label('操作系统')
                    ->copyable(),
                TextColumn::make('motherboard')
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->label('主板')
                    ->copyable()
                    ->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('disk')
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->label('硬盘')
                    ->copyable()
                    ->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('ip')
                    ->label('IP')
                    ->copyable()
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->searchable(isIndividual: true, isGlobal: false),
            ])
            ->filtersFormColumns(2)
            ->filters([
                SelectFilter::make('computed_room_code')
                    ->label('电脑所在机房')
                    ->options(ComputerRoom::query()->get()->pluck('name', 'code')),
                SelectFilter::make('state')
                    ->label('使用状态')
                    ->options(ComputerStateEnum::class),
            ], layout: FiltersLayout::AboveContent)
            ->actions([
                Action::make('下载物品二维码')
                    ->url(fn(Computer $computer) => route('computer.qrcode', ['id' => $computer->id])),
                EditAction::make(),
            ])->actionsPosition(ActionsPosition::BeforeCells)
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComputers::route('/'),
            'create' => Pages\CreateComputer::route('/create'),
            'edit' => Pages\EditComputer::route('/{record}/edit'),
        ];
    }
}
