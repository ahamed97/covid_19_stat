<?php

namespace App\Console\Commands;

use Exception;
use GuzzleHttp\Client;
use App\Models\CovidStat;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Repositories\CovidStatRepository;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;

class FetchSLCovidStat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:sl-covid-stat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the covid 19 statistics of Sri Lanka';

    private $covidStatRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CovidStatRepository $covidStatRepository)
    {
        $this->covidStatRepository = $covidStatRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $client = new Client(); //GuzzleHttp\Client
            $result = $client->get(config('app.covid_stat_fetch_url'));
            if($result->getStatusCode() == Response::HTTP_OK){
                $result = json_decode($result->getBody(), true);

                $covidData['local_new_cases'] = $result['data']['local_new_cases'] ?? 0;
                $covidData['local_total_cases'] = $result['data']['local_total_cases'] ?? 0;
                $covidData['local_deaths'] = $result['data']['local_deaths'] ?? 0;
                $covidData['local_new_deaths'] = $result['data']['local_new_deaths'] ?? 0;
                $covidData['local_recovered'] = $result['data']['local_recovered'] ?? 0;
                $covidData['local_active_cases'] = $result['data']['local_active_cases'] ?? 0;
                $covidData['update_date_time'] = $result['data']['update_date_time'] ?? null;

                $oldData = $this->covidStatRepository->first();
                if($oldData){
                    $oldData->delete();
                }
                $this->covidStatRepository->updateOrCreate($covidData);

                Log::info('Covid 19 stats data fetched at ' . now());
            }

        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return 0;
    }
}
