@extends('layouts/contentNavbarLayout')

@section('title', 'Reports Management')

@section('content')
    <div class="card">
        <h5 class="card-header">Bit History</h5>
        <div id="alert-container"></div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Username</th>
                        <th>Game Name</th>
                        <th>Session</th>
                        <th>Digit</th>
                        <th>Amount</th>
                        <th>Pana</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (isset($bets) && !empty($bets) && is_array($bets))
                        @foreach ($bets as $key => $user)
                            <tr id="user-{{ $user['id'] }}">
                                <td>{{ $user['id'] ?? 'N/A' }}</td>
                                <td>{{ $user['username'] ?? 'N/A' }}</td>
                                <td>{{ $user['game_name'] ?? 'N/A' }}</td>
                                <td>{{ $user['session'] ?? 'N/A' }}</td>
                                <td>{{ $user['digits'] ?? 'N/A' }}</td>
                                <td>{{ $user['amount'] ?? 'N/A' }}</td>
                                <td>{{ $user['pana'] ?? 'N/A' }}</td>
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
