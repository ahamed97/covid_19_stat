<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function updateOrCreate(array $attributes): Model
    {
        return $this->model->updateOrCreate($attributes);
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model::paginate();
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function first()
    {
        return $this->model->first();
    }
}
