@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3><b> {{__('Covid 19 Statistics in Sri Lanka')}}</b></h3> [Last updated on :
                        {{ $covidStat->update_date_time ?? '-' }} ]
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="row ">
                            @if ($covidStat)
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card l-bg-cherry">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i>
                                            </div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Local New Cases</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{ $covidStat->local_new_cases ?? '-' }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card l-bg-blue-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Local Total Cases</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{ $covidStat->local_total_cases ?? '-' }}
                                                    </h2>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card l-bg-green-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Local Deaths</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{ $covidStat->local_deaths ?? '-' }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card l-bg-orange-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Local New Deaths</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{ $covidStat->local_new_deaths ?? '-' }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card l-bg-green-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Local Recovered</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{ $covidStat->local_recovered ?? '-' }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card l-bg-orange-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Local Active Cases</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        {{ $covidStat->local_active_cases ?? '-' }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p class="p-2">Data not available.</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
