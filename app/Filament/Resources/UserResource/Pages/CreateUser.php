<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
  protected static string $resource = UserResource::class;

  public function getRecord(): ?Model
  {
    return $this->record;
  }
}
