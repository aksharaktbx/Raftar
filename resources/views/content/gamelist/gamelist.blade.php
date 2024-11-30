@extends('layouts/contentNavbarLayout')

@section('title', 'Game Management')

@section('content')
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Game Chart List</h5>
        <div id="alert-container"></div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Game Name</th>
                        <th>Open Time</th>
                        <th>Open Time Short</th>
                        <th>Close Time</th>
                        <th>Msg Status</th>
                        <th>Open Duration</th>
                        <th>Close Duration</th>
                        <th>Time Srt</th>
                        <th>Web Chart Url</th>
                        <th>Note</th>
                        <th>Message</th>
                        <th>Status</th>
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
                                <td>{{ $user['close_duration'] ?? 'N/A' }}</td>
                                <td>{{ $user['time_srt'] ?? 'N/A' }}</td>
                                <td>{{ $user['web_chart_url'] ?? 'N/A' }}</td>
                                <td>{{ $user['note'] ?? 'N/A' }}</td>
                                <td>{{ $user['msg'] ?? 'N/A' }}</td>
                                <td> <button class="btn btn-success btn-sm approve-btn" data-bs-toggle="modal">
                                        Active
                                    </button>

                                    <button class="btn btn-danger btn-sm disapprove-btn" data-bs-toggle="modal">
                                        Deactive
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal">
                                        Edit
                                    </button>
                                    <button class="btn btn-warning btn-sm delete-btn"> Delete </button>
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
