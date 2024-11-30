@extends('layouts/contentNavbarLayout')

@section('title', 'User Management')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('playvideo.create') }}" class="btn btn-primary">Add How To Play Video</a>
    </div>
    <div class="card">
        <h5 class="card-header">How To Play Video</h5>
        <div id="alert-container"></div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Video Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (isset($video_link) && !empty($video_link))
                        <tr>
                            <td>1</td>
                            <td>
                                <div style="background-color: yellow; padding: 10px;">
                                    <a href="{{ $video_link }}" target="_blank">{{ $video_link }}</a>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm approve-btn" data-bs-toggle="modal"
                                    data-bs-target="#debitModal">Active</button>
                                <button class="btn btn-danger btn-sm disapprove-btn" data-bs-toggle="modal"
                                    data-bs-target="#creditModal">Deactive</button>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No Video Link found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
