@extends('layouts/contentNavbarLayout')

@section('title', 'Add How To Play Video Link')

@section('content')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add How To Play Video Link</h5>
                </div>
                <div class="card-body">
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

                    <form action="{{ route('storeplayvideo') }}" method="POST" id="videoform">
                        @csrf
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="video_link">Video Link</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" id="video_link" name="video_link"
                                    placeholder="Video Link" required>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('playvideo.create') }}" class="btn btn-secondary m-2">Cancel</a>
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
        document.getElementById('videoform').addEventListener('submit', function(event) {
            // Optional: Add client-side form validation or custom handling here
            console.log("Submitting videoform form...");
        });
    </script>
@endsection
