<?php

namespace App\Repositories;

use App\Models\CovidStat;
use App\Repositories\BaseRepository;

class CovidStatRepository extends BaseRepository
{
    protected $model;

    public function __construct(CovidStat $model)
    {
        $this->model = $model;
    }
}
