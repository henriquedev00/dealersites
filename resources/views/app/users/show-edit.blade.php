@extends('layouts.master')

@section('title', $user->name)

@section('content')
    <div class="container vh-100 p-5 mt-5">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-text d-flex flex-column justify-content-center align-items-center">
                        <div class="form-floating w-75 mb-4">
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" value="{{ old('name', $user->name) }}">
                            <label for="name" class="form-label">Name:</label>

                            @if($errors->has('name'))
                                <div id="nameFeedback" class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-floating w-75 mb-4">
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" value="{{ old('email', $user->email) }}">
                            <label for="email" class="form-label">Email address:</label>

                            @if($errors->has('email'))
                                <div id="emailFeedback" class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-floating w-75 mb-4">
                            <input type="password" name="new_password" class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}" id="new_password">
                            <label for="new_password" class="form-label">New password:</label>

                            @if($errors->has('new_password'))
                                <div id="new_passwordFeedback" class="invalid-feedback">
                                    {{ $errors->first('new_password') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-floating w-75 mb-4">
                            <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation">
                            <label for="new_password_confirmation" class="form-label">New password confirmation:</label>
                        </div>

                        <div class="w-75 mb-4">
                            <button class="btn btn-success  py-2">Update</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary py-2">Back</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
