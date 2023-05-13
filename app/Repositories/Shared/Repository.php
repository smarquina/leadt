<?php

namespace App\Repositories\Shared;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    public function save(Model $model): void
    {
        $model->save();
    }
}
