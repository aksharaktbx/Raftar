@extends('layouts/contentNavbarLayout')

@section('title', 'Wallet Management')

@section('content')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Wallet</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('addwallet.store') }}" method="POST" id="addwallet">
                        @csrf
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="user_id">Select User</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="user_id" name="user_id" required>
                                    <option value="">-- Select User --</option>
                                    @foreach ($users ?? [] as $user)
                                        <option value="{{ $user['id'] }}">{{ $user['username'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="amount">Amount</label>
                            <div class="col-sm-10">
                                <input type="number" step="0.01" class="form-control" id="amount" name="amount"
                                    placeholder="Amount" required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="payment_method">Payment Method</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="payment_method" name="payment_method"
                                    placeholder="Payment Method" required>
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
    <script>
        document.getElementById('addwallet').addEventListener('submit', function(event) {
            // Optional: Add client-side form validation or custom handling here
            console.log("Submitting videoform form...");
        });
    </script>
@endsection
