@extends('layouts/contentNavbarLayout')

@section('title', 'QR Code Management')

@section('content')
    <div class="card">
        <div class="row">
            <div class="col-md-6 m-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQRCodeModal">
                    Add New QR Code
                </button>
            </div>
        </div>

        @if (session('successMessage'))
            <div class="alert alert-success">
                {{ session('successMessage') }}
            </div>
        @endif

        @if (session('errorMessage'))
            <div class="alert alert-danger">
                {{ session('errorMessage') }}
            </div>
        @endif

        <div id="alert-container"></div>

        <div class="table-responsive text-nowrap">
            <table class="table" id="qr-code-table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Filename</th>
                        <th>QR Code</th>
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
                            <td colspan="6" class="text-center">No Deposit found.</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>

    <!-- Add QR Code Modal -->
    <div class="modal fade" id="addQRCodeModal" tabindex="-1" aria-labelledby="addQRCodeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQRCodeModalLabel">Add New QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="qr_code" class="form-label">Upload QR Code</label>
                            <input type="file" class="form-control" id="qr_code" name="qr_code" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Bootstrap CDN for Modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
