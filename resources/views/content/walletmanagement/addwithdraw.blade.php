@extends('layouts/contentNavbarLayout')

@section('title', 'Game Management')

@section('content')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Game List</h5>
                    <a href="{{ route('game-add') }}" class="btn btn-primary">Add Game</a>
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

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Game Name</th>
                                <th>Open Time</th>
                                <th>Close Time</th>
                                <th>Msg Status</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($games as $index => $game)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $game->game_name }}</td>
                                    <td>{{ $game->open_time }}</td>
                                    <td>{{ $game->close_time }}</td>
                                    <td>{{ $game->msg_status }}</td>
                                    <td>
                                        <form action="{{ route('game-toggle-status', $game->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn btn-sm {{ $game->status ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $game->status ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('game-edit', $game->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('game-delete', $game->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this game?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
