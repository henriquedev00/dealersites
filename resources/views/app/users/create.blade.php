@extends('layouts.master')

@section('title', 'Register new user')

@section('content')
    <div class="container vh-100 p-5 mt-5">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="card-text d-flex flex-column justify-content-center align-items-center">
                        <div class="form-floating w-75 mb-4">
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" value="{{ old('name') }}">
                            <label for="name" class="form-label">Name:</label>

                            @if($errors->has('name'))
                                <div id="nameFeedback" class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-floating w-75 mb-4">
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" value="{{ old('email') }}">
                            <label for="email" class="form-label">Email address:</label>

                            @if($errors->has('email'))
                                <div id="emailFeedback" class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-floating w-75 mb-4">
                            <input type="password" name="password" class="form-control" id="password">
                            <label for="password" class="form-label {{ $errors->has('password') ? 'is-invalid' : '' }}">Password:</label>

                            @if($errors->has('password'))
                                <div id="passwordFeedback" class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-floating w-75 mb-4">
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            <label for="password_confirmation" class="form-label">Password confirmation:</label>
                        </div>

                        <div class="w-75 mb-4">
                            <button class="btn btn-success  py-2">Save</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary py-2">Back</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
