@extends('layouts/contentNavbarLayout')

@section('title', 'Game Management')

@section('content')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Game</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('game-store') }}" method="POST" id="gameform">
                        @csrf <!-- CSRF token -->
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="game_name">Game Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="game_name" name="game_name"
                                    placeholder="Game Name" required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="open_time">Open Time</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control time-picker" id="open_time" name="open_time"
                                    placeholder="10:00 AM" required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="open_time_sort">Open Time Sort</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control time-picker" id="open_time_sort"
                                    name="open_time_sort" placeholder="HH:mm:ss" required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="close_time">Close Time</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control time-picker" id="close_time" name="close_time"
                                    placeholder="06:00 PM" required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="msg_status">Msg Status</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="msg_status" name="msg_status"
                                    placeholder="Message Status (integer)" required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="open_duration">Open Duration</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="open_duration" name="open_duration"
                                    placeholder="Open Duration (in minutes)" required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="close_duration">Close Duration</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="close_duration" name="close_duration"
                                    placeholder="Close Duration (in minutes)" required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="time_srt">Time Sort</label>
                            <div class="col-sm-10">
                                <input class="form-control datetime-picker" type="text" id="time_srt" name="time_srt"
                                    placeholder="YYYY-MM-DD HH:mm:ss" required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="web_chart_url">Web Chart URL</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" id="web_chart_url" name="web_chart_url"
                                    placeholder="https://example.com" required>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="note">Note</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="note" name="note"
                                    placeholder="Additional Notes">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="msg">Message</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="msg" name="msg" placeholder="Message (optional)"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Initialize Flatpickr for time and datetime inputs
        flatpickr(".time-picker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i:S"
        });
        flatpickr(".datetime-picker", {
            enableTime: true,
            dateFormat: "Y-m-d H:i:s",
            time_24hr: true
        });
    </script>
@endsection
