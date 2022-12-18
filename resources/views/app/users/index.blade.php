@extends('layouts.master')

@section('title', 'Usuários')

@section('content')
    <div class="container vh-100 p-5 mt-5">
        <div class="card">
            <div class="card-body">

                <nav class="nav d-flex justify-content-end mb-2">
                    <a href="{{ route('users.create') }}" class="btn btn-primary py-2">Register new user</a>
                </nav>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="dropdown">

                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Options
                                        </a>
                                      
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('users.show-edit', $user->id) }}">Show / Edit</a>
                                            </li>
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmation-delete-user{{$user->id}}">
                                                    Delete
                                                </button>
                                            </li>
                                        </ul>
                                    </div> 
                                </td>
                            </tr>

                            @include('app.users.partials._confirmation-delete-user')
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
