<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $label = '管理员用户';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('用户名')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->label('邮箱')
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label('手机号')
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->label('密码')
                    ->required(fn () => $form->getOperation() === 'create')
                    ->password()
                    ->minLength(6),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
