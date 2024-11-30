@extends('layouts/contentNavbarLayout')

@section('title', 'Create Game Chart')

@section('content')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Game Chart</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('game-chart-store') }}" method="POST">
                        @csrf
                        <div class="row mb-6">
                            <label for="game_name" class="col-sm-2 col-form-label">Game Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('game_name') is-invalid @enderror"
                                    id="game_name" name="game_name" placeholder="Enter Game Name"
                                    value="{{ old('game_name') }}">
                                @error('game_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label for="jodiUrl" class="col-sm-2 col-form-label">Jodi Url</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control @error('jodiUrl') is-invalid @enderror"
                                    id="jodiUrl" name="jodiUrl" placeholder="Enter Jodi URL" value="{{ old('jodiUrl') }}">
                                @error('jodiUrl')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label for="panelUrl" class="col-sm-2 col-form-label">Panel Url</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control @error('panelUrl') is-invalid @enderror"
                                    id="panelUrl" name="panelUrl" placeholder="Enter Panel URL"
                                    value="{{ old('panelUrl') }}">
                                @error('panelUrl')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('game-chart') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
