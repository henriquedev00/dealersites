@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <div class="container vh-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-6">
                <div class="card py-5">
                    <div class="card-body">
        
                        <h2 class="card-title text-center mb-5">DealerSites</h2>
        
                        <form action="{{ route('login.authenticate') }}" method="POST">
                            @csrf
        
                            <div class="card-text d-flex flex-column justify-content-center align-items-center">
                                <div class="form-floating w-75 mb-4 has-validation">
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

                                <div class="w-75 mb-4">
                                    <button class="btn btn-secondary w-100 py-2">Login</button>
                                </div>
                            </div>
                        </form>

                        <div class="card-text d-flex justify-content-center">
                            <a href="{{ route('register.create') }}" class="link-secondary">Não tem uma conta? Registre-se aqui</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
