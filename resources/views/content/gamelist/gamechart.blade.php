@extends('layouts/contentNavbarLayout')

@section('title', 'Game Management')

@section('content')
    <div class="card">
        <h5 class="card-header">Game Chart</h5>
        <div id="alert-container">
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
        </div>
        <div class="d-flex justify-content-end m-3">
            <a href="{{ route('game-chart-create') }}" class="btn btn-primary">Create New Game Chart</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Game Name</th>
                        <th>Jodi Url</th>
                        <th>Panel Url</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($data) && !empty($data) && is_array($data))
                        @foreach ($data as $key => $game)
                            <tr id="game-{{ $game['id'] }}">
                                <td>{{ $game['id'] }}</td>
                                <td>{{ $game['game_name'] }}</td>
                                <td><a href="{{ $game['jodiUrl'] }}" target="_blank">{{ $game['jodiUrl'] }}</a></td>
                                <td><a href="{{ $game['panelUrl'] }}" target="_blank">{{ $game['panelUrl'] }}</a></td>
                                <td>
                                    <form action="{{ route('game-chart-destroy', $game['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No Game Charts Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
