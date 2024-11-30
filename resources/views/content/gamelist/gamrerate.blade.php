@extends('layouts/contentNavbarLayout')

@section('title', 'Game Management')

@section('content')
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Game Rate</h5>
        <div id="alert-container"></div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Game Name</th>
                        <th>Game Rate</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (isset($data) && !empty($data) && is_array($data))
                        @foreach ($data as $key => $user)
                            <tr id="user-{{ $user['id'] }}">
                                <td>{{ $user['id'] ?? 'N/A' }}</td>
                                <td>{{ $user['name'] ?? 'N/A' }}</td>
                                <td>{{ $user['rate'] ?? 'N/A' }}</td>
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
