@extends('layouts/contentNavbarLayout')

@section('title', 'User Management')

@section('content')

    <!-- New Contact Us Button -->
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('createwalletvideo.create') }}" class="btn btn-primary">Add New Contact Us</a>
    </div>
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Contact Us</h5>
        <div id="alert-container"></div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Facebook Link</th>
                        <th>Instagram Link</th>
                        <th>Telegram Link</th>
                        <th>What's Up Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (isset($data) && !empty($data) && is_array($data))
                        @foreach ($data as $key => $user)
                            <tr id="user-{{ $user['id'] }}">
                                <td>{{ $user['id'] ?? 'N/A' }}</td>
                                <td>{{ $user['game_name'] ?? 'N/A' }}</td>
                                <td>{{ $user['open_time'] ?? 'N/A' }}</td>
                                <td>{{ $user['open_time_sort'] ?? 'N/A' }}</td>
                                <td>{{ $user['close_time'] ?? 'N/A' }}</td>
                                <td>{{ $user['msg_status'] ?? 'N/A' }}</td>
                                <td>{{ $user['open_duration'] ?? 'N/A' }}</td>

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
