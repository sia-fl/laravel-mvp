<?php

namespace App\Filament\Resources\Tag;

use App\Enum\TagWarn\TagWarnTargetLevelEnum;
use App\Enum\TagWarn\TagWarnTargetMethodEnum;
use App\Filament\Resources\Tag\TagWarnTargetResource\Pages;
use App\Models\Tag\TagWarnTarget;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TagWarnTargetResource extends Resource
{
    protected static ?string $model = TagWarnTarget::class;

    protected static ?string $navigationGroup = '告警';

    protected static ?string $label = '告警对象';

    protected static ?string $navigationIcon = 'heroicon-o-phone-arrow-up-right';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('告警名称')
                    ->required(),
                Select::make('level')
                    ->label('告警级别')
                    ->options(TagWarnTargetLevelEnum::class)
                    ->required(),
                Select::make('method')
                    ->label('告警方式')
                    ->options(TagWarnTargetMethodEnum::class)
                    ->required(),
                TextInput::make('target')
                    ->label('预警目标(手机号&邮箱地址&url)')
                    ->required(),
                Textarea::make('memo')
                    ->label('备注')
                    ->columnSpan(2)
                    ->rows(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('告警对象')
                    ->searchable(),
                Tables\Columns\TextColumn::make('level')
                    ->badge()
                    ->label('告警级别'),
                Tables\Columns\TextColumn::make('method')
                    ->label('告警方式')
                    ->searchable(),
                Tables\Columns\TextColumn::make('count')
                    ->label('告警次数')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('创建时间'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('method')
                    ->label('告警方式')
                    ->options(TagWarnTargetMethodEnum::class),
            ])
            ->actions([
                Tables\Actions\Action::make('测试告警')
                    ->link(),
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
            'index' => Pages\ListTagWarnTargets::route('/'),
            'create' => Pages\CreateTagWarnTarget::route('/create'),
            'edit' => Pages\EditTagWarnTarget::route('/{record}/edit'),
        ];
    }
}
