<?php

declare(strict_types=1);

namespace App\Repositories\Shared;

use Illuminate\Database\Eloquent\Model;

abstract readonly class Repository implements RepositoryInterface
{
    public function save(Model $model): void
    {
        $model->save();
    }
}
