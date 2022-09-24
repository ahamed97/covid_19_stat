<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CovidStatInterface;
use App\Repositories\CovidStatRepository;

class HomeController extends Controller
{
    private $covidStatRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CovidStatRepository $covidStatRepository)
    {
        $this->covidStatRepository = $covidStatRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $covidStat = $this->covidStatRepository->first();

        return view('welcome', [
            'covidStat' => $covidStat
        ]);
    }
}
