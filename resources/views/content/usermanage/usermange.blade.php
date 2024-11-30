@extends('layouts/contentNavbarLayout')

@section('title', 'User Management')

@section('content')
    <div class="card">
        <h5 class="card-header">User Management</h5>
        <form method="GET" action="{{ url()->current() }}" class="mb-3 px-3">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="Search by Mobile Number"
                        value="{{ $search ?? '' }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ url()->current() }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>
        <div id="alert-container"></div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>User Name</th>
                        <th>Mobile Number</th>
                        <th>M Pin</th>
                        <th>Wallet Balance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (isset($users) && count($users) > 0)
                        @foreach ($users as $index => $user)
                            <tr id="user-row-{{ $user['id'] }}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user['username'] }}</td>
                                <td>{{ $user['mobile_number'] }}</td>
                                <td>{{ $user['mpin'] }}</td>
                                <td>{{ $user['wallet_balance'] }}</td>
                                <td>
                                    <!-- Activate/Deactivate Buttons -->
                                    @if ($user['is_active'] == 1)
                                        <button class="btn btn-warning btn-sm deactivate-btn"
                                            data-user-id="{{ $user['id'] }}">
                                            Deactivate
                                        </button>
                                    @else
                                        <button class="btn btn-success btn-sm activate-btn"
                                            data-user-id="{{ $user['id'] }}">
                                            Activate
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No users found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to toggle user status (active/deactivate)
            function toggleUserStatus(userId, status) {
                const rowId = `#user-row-${userId}`;
                const alertContainer = document.getElementById('alert-container');
                alertContainer.innerHTML = '';

                fetch(`https://devashishsoni.site/raftar786/public/api/users/status/${userId}`, {
                        method: 'POST', // Assuming you use POST for this request
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            is_active: status
                        }),
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw new Error(err.message || 'Failed to update the user status.');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        alertContainer.innerHTML = `
                        <div class="alert alert-success" role="alert">
                            ${data.message || 'User status updated successfully.'}
                        </div>
                    `;
                        // Change the button based on the new status
                        const btn = document.querySelector(rowId).querySelector(
                            '.deactivate-btn, .activate-btn');
                        if (status === 1) {
                            btn.classList.replace('btn-success', 'btn-warning');
                            btn.classList.replace('activate-btn', 'deactivate-btn');
                            btn.innerText = 'Deactivate';
                        } else {
                            btn.classList.replace('btn-warning', 'btn-success');
                            btn.classList.replace('deactivate-btn', 'activate-btn');
                            btn.innerText = 'Activate';
                        }
                    })
                    .catch(error => {
                        alertContainer.innerHTML = `
                        <div class="alert alert-danger" role="alert">
                            ${error.message || 'An error occurred while updating the user status.'}
                        </div>
                    `;
                    });
            }

            // Event listeners for activating and deactivating users
            document.querySelectorAll('.activate-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user-id');
                    toggleUserStatus(userId, 1); // 1 means active
                });
            });

            document.querySelectorAll('.deactivate-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user-id');
                    toggleUserStatus(userId, 0); // 0 means deactivated
                });
            });
        });
    </script>
@endsection
