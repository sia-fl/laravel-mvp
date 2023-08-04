<?php

namespace App\Livewire;

use App\Models\Tag\TagMoveLog;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class NearbyTag extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public string $stationCode;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                TagMoveLog::query()
                    ->where('station_code_after', $this->stationCode)
                    ->with('tagBind')
                    ->groupBy('code')
            )
            ->columns([
                ImageColumn::make('tagBind.image')
                    ->label('物品图片'),
                TextColumn::make('code')
                    ->label('物品编号'),
                TextColumn::make('tagBind.name')
                    ->label('物品名称'),
                TextColumn::make('state')
                    ->label('状态'),
                TextColumn::make('station_code_before')
                    ->label('前一基站编号'),
                TextColumn::make('station_name_before')
                    ->label('前一基站名称'),
                TextColumn::make('created_at')
                    ->label('检测时间'),
            ]);
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.nearby-tag');
    }
}
