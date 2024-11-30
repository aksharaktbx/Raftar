@extends('layouts/contentNavbarLayout')

@section('title', 'User Management')

@section('content')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Wallet Video Link</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="game_name">Video Link</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="game_name" name="game_name"
                                    placeholder="Video Link">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('add-wallet-video') }}" class="btn btn-secondary m-2">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Include Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Include Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        // Initialize Flatpickr on the Time Sort field with the desired format
        flatpickr("#time_srt", {
            enableTime: true, // Enable time selection
            dateFormat: "Y-m-d H:i:S", // Date format: Year-Month-Day Hours:Minutes:Seconds
            time_24hr: true // Use 24-hour format
        });

        // Initialize Flatpickr on the Open Duration field (same as before)
        flatpickr("#open_duration", {
            enableTime: true, // Enable time selection
            dateFormat: "Y-m-d H:i:S", // Date format: Year-Month-Day Hours:Minutes:Seconds
            time_24hr: true // Use 24-hour format
        });
    </script>
@endsection
