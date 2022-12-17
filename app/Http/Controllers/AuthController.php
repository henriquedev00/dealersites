<?php

namespace App\Http\Controllers;

use Throwable;
use App\Services\AuthService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request, AuthService $authService)
    {
        try {
            return $authService->authenticate($request->only('email', 'password'));
        } catch (Throwable $th) {
            Alert::error('Internal error', 'Contact support.');

            return back();
        }
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request, AuthService $authService)
    {
        try {
            DB::beginTransaction();

            $responseAuthService = $authService->store($request->only('name', 'email', 'password'));

            DB::commit();

            return $responseAuthService;
        } catch (Throwable $th) {
            DB::rollBack();

            Alert::error('Internal error', 'Contact support.');

            return back();
        }
    }
}
