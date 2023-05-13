<?php

namespace App\Repositories\Shared;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * Create a model.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function save(Model $model): void;
}
