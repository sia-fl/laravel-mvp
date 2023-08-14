<?php

namespace App\Filament\Resources\Tag\TagWarnRuleInResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class WarnTargetsRelationManager extends RelationManager
{
    protected static string $relationship = 'warnTargets';

    protected static ?string $label = '告警目标';

    protected static ?string $recordTitleAttribute = 'name';

    public function table(Table $table): Table
    {
        return $table
            ->heading('已关联告警目标')
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
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()->preloadRecordSelect(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
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
}
