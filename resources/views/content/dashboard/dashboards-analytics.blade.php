@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    @vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
    @vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
    @vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">

            <div class="col-md-12 col-xxl-4 mb-5">
                <div class="card h-100 mb-5">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body mt-1">
                                <h5 class="card-title mb-1 text-nowrap">Total Users</h5>
                                <h3 class="card-title mb-1 text-nowrap">{{ $totalUsers }}</h3>

                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card-body pb-0 text-end">
                                <img src="{{ asset('assets/img/illustrations/user.png') }}" width="91" height="144"
                                    class="rounded-start img-fluid" alt="View Sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xxl-4 mb-5">
                <div class="card h-100 mb-5">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body mt-1">
                                <h5 class="card-title mb-1 text-nowrap">Active Users</h5>
                                <h3 class="card-title mb-1 text-nowrap">{{ $activeUsers }}</h3>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card-body pb-0 text-end">
                                <img src="{{ asset('assets/img/illustrations/user.png') }}" width="91" height="144"
                                    class="rounded-start img-fluid" alt="View Sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xxl-4 mb-5">
                <div class="card h-100 mb-5">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body mt-1">
                                <h5 class="card-title mb-1 text-nowrap">DeActive Users</h5>
                                <h3 class="card-title mb-1 text-nowrap">{{ $inactiveUsers }}</h3>

                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card-body pb-0 text-end">
                                <img src="{{ asset('assets/img/illustrations/user.png') }}" width="91" height="144"
                                    class="rounded-start img-fluid" alt="View Sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12 col-xxl-4 mb-5">
                <div class="card h-100 mb-5">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body mt-1">
                                <h5 class="card-title mb-1 text-nowrap">Total Deposit</h5>
                                <h3 class="card-title mb-1 text-nowrap">{{ number_format($totalDepositAmount, 2) }}</h3>

                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card-body pb-0 text-end">
                                <img src="{{ asset('assets/img/illustrations/deposit.png') }}" width="91" height="144"
                                    class="rounded-start img-fluid" alt="View Sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xxl-4 mb-5">
                <div class="card h-100 mb-5">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body mt-1">
                                <h5 class="card-title mb-1 text-nowrap">Total Withdraw</h5>
                                <h3 class="card-title mb-1 text-nowrap">{{ number_format($totalWithdrawAmount, 2) }}</h3>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card-body pb-0 text-end">
                                <img src="{{ asset('assets/img/illustrations/deposit.png') }}" width="91" height="144"
                                    class="rounded-start img-fluid" alt="View Sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xxl-4 mb-5">
                <div class="card h-100 mb-5">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body mt-1">
                                <h5 class="card-title mb-1 text-nowrap">Total Games</h5>
                                <h3 class="card-title mb-1 text-nowrap">{{ $totalGamesCount }}</h3>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card-body pb-0 text-end">
                                <img src="{{ asset('assets/img/illustrations/deposit.png') }}" width="91"
                                    height="144" class="rounded-start img-fluid" alt="View Sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12 col-xxl-4 mb-5">
                <div class="card h-100 mb-5">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body mt-1">
                                <h5 class="card-title mb-1 text-nowrap">Total Bets</h5>
                                <h3 class="card-title mb-1 text-nowrap">{{ $totalBetsCount }}</h3>

                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card-body pb-0 text-end">
                                <img src="{{ asset('assets/img/illustrations/withdraw.png') }}" width="91"
                                    height="144" class="rounded-start img-fluid" alt="View Sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xxl-4 mb-5">
                <div class="card h-100 mb-5">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body mt-1">
                                <h5 class="card-title mb-1 text-nowrap">Open Game</h5>
                                <h3 class="card-title mb-1 text-nowrap"></h3>


                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card-body pb-0 text-end">
                                <img src="{{ asset('assets/img/illustrations/withdraw.png') }}" width="91"
                                    height="144" class="rounded-start img-fluid" alt="View Sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xxl-4 mb-5">
                <div class="card h-100 mb-5">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body mt-1">
                                <h5 class="card-title mb-1 text-nowrap">Close Game</h5>
                                <h3 class="card-title mb-1 text-nowrap"></h3>


                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    @endsection
