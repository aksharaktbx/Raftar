@extends('layouts/contentNavbarLayout')

@section('title', 'Reports Management')

@section('content')
    <div class="card">
        <h5 class="card-header">Deposit History</h5>
        <div id="alert-container"></div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>User Name</th>
                        <th>Transaction Type</th>
                        <th>Amount</th>
                        <th>Transaction Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (!empty($transactions))
                        @foreach ($transactions as $key => $transaction)
                            <tr id="transaction-{{ $transaction['id'] }}">
                                <td>{{ $transaction['id'] ?? 'N/A' }}</td>
                                <td>{{ $transaction['username'] ?? 'N/A' }}</td>
                                <td>{{ $transaction['transaction_type'] ?? 'N/A' }}</td>
                                <td>{{ $transaction['amount'] ?? 'N/A' }}</td>
                                <td>{{ $transaction['transaction_date'] ?? 'N/A' }}</td>
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
                            <td colspan="5" class="text-center">No Deposit found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Debit Modal -->
    <div class="modal fade" id="debitModal" tabindex="-1" aria-labelledby="debitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="debitModalLabel">Activate Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to activate this transaction?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success">Activate</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Credit Modal -->
    <div class="modal fade" id="creditModal" tabindex="-1" aria-labelledby="creditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="creditModalLabel">Deactivate Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to deactivate this transaction?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Deactivate</button>
                </div>
            </div>
        </div>
    </div>
@endsection
