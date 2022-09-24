<?php

namespace App\Repositories;

use App\Models\HelpGuide;

class HelpGuideRepository extends BaseRepository
{
    protected $model;

    public function __construct(HelpGuide $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model::orderBy('created_at','DESC')->paginate(3);
    }

    public function userHelpGuides($userId)
    {
        return $this->model::where('user_id',$userId)->orderBy('created_at','DESC')->paginate(3);
    }
}
