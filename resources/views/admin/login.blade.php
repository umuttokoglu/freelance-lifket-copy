@extends('layout.admin.index')

@section('adminPageTitle', __('admin/login.title'))

@section('adminPageCss')
    <link href="{{ asset('assets/admin/css/light/authentication/auth-boxed.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/dark/authentication/auth-boxed.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h2>{{ __('admin/login.form.title') }}</h2>
                            <p>{{ __('admin/login.form.desc') }}</p>
                        </div>

                        @include('shared.admin.session_message')

                        <form action="{{ route('admin.login') }}" method="post">
                            @csrf

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('admin/login.form.email.label') }}</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                           value="{{ old('email') }}">

                                    @error('email')
                                    <small class="text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-4">
                                    <label for="password"
                                           class="form-label">{{ __('admin/login.form.password.label') }}</label>
                                    <input type="password" id="password" name="password" class="form-control">

                                    @error('password')
                                    <small class="text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-check form-check-primary form-check-inline">
                                        <input class="form-check-input me-3" type="checkbox" id="form-check-default"
                                               name="remember_me">
                                        <label class="form-check-label" for="form-check-default">
                                            {{ __('admin/login.form.remember_me.label') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-4">
                                    <button
                                        class="btn btn-secondary w-100">{{ __('admin/login.form.button.sign_in') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
