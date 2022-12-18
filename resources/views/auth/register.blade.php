@extends('layouts.master')

@section('title', 'Registre-se')

@section('content')
    <div class="container vh-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-6">
                <div class="card py-5">
                    <div class="card-body">
        
                        <h2 class="card-title text-center mb-5">DealerSites</h2>
        
                        <form action="{{ route('register.store') }}" method="POST">
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
                                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password">
                                    <label for="password" class="form-label">Password:</label>

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
                                    <button class="btn btn-secondary w-100 py-2">Registre-se</button>
                                </div>
                            </div>
                        </form>

                        <div class="card-text d-flex justify-content-center">
                            <a href="{{ route('login.index') }}" class="link-secondary">Já tem uma conta? Faça login aqui</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
