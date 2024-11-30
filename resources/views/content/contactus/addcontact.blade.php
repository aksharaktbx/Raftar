@extends('layouts/contentNavbarLayout')

@section('title', 'Add Contact')

@section('content')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Contact</h5>
                </div>
                <div class="card-body">
                    <!-- Success Message -->
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

                    <form id="addContactForm" method="POST" action="{{ route('contactus.store') }}">
                        @csrf
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="mobile_number">Mobile Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                                    placeholder="Mobile Number" required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="gmail">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="gmail" name="gmail" placeholder="Email"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="facebook_link">Facebook Link</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" id="facebook_link" name="facebook_link"
                                    placeholder="Facebook Link">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="instagram_link">Instagram Link</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" id="instagram_link" name="instagram_link"
                                    placeholder="Instagram Link">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="telegram_link">Telegram Link</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" id="telegram_link" name="telegram_link"
                                    placeholder="Telegram Link">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="whatsapp_link">WhatsApp Link</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" id="whatsapp_link" name="whatsapp_link"
                                    placeholder="WhatsApp Link">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                                <a href="" class="btn btn-secondary m-2">Cancel</a>
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
        document.getElementById('addContactForm').addEventListener('submit', function(event) {
            // Optional: Add client-side form validation or custom handling here
            console.log("Submitting contact form...");
        });
    </script>
@endsection
