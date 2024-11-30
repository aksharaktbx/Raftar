@extends('layouts/contentNavbarLayout')

@section('title', 'Wallet Management')

@section('content')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Withdraw Amount</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="game_name">Amount</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="game_name" name="game_name"
                                    placeholder="Amount">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
