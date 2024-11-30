@extends('layouts/contentNavbarLayout')

@section('title', 'Wallet Management')

@section('content')
    <div class="card">
        <h5 class="card-header">Transaction History</h5>
        <div id="alert-container"></div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Transaction Type</th>
                        <th>Amount</th>
                        <th>Transaction Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (isset($transactions) && !empty($transactions) && is_array($transactions))
                        @foreach ($transactions as $key => $user)
                            <tr id="user-{{ $user['id'] }}">
                                <td>{{ $user['id'] ?? 'N/A' }}</td>
                                <td>{{ $user['transaction_type'] ?? 'N/A' }}</td>
                                <td>{{ $user['amount'] ?? 'N/A' }}</td>
                                <td>{{ $user['transaction_date'] ?? 'N/A' }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm approve-btn" data-bs-toggle="modal"
                                        data-bs-target="#debitModal">Active</button>
                                    <button class="btn btn-danger btn-sm disapprove-btn" data-bs-toggle="modal"
                                        data-bs-target="#creditModal">Deactive</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No users found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>


@endsection
