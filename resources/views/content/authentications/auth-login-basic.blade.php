@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <img src="{{ asset('assets/img/logo/raftar786.png') }}" alt class=".img-fluid">
                            </a>
                        </div>
                        <h4 class="mb-1">Welcome to {{ config('variables.templateName') }}! 👋</h4>
                        <p class="mb-6">Please sign-in to your account and start the adventure</p>
                        <form id="formAuthentication" class="mb-6" action="{{ route('login') }}" method="POST">
                            @csrf <!-- CSRF Protection -->
                            <div class="mb-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus required>
                            </div>
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-6">
                                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
