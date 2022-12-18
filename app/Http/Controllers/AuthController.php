<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Validation\UnauthorizedException;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(UserLoginRequest $request, AuthService $authService)
    {
        try {
            return $authService->authenticate($request->only('email', 'password'));
        } catch (UnauthorizedException $e) {
            Alert::error('Unauthorized', 'These credentials do not match our records.');

            return back();
        } catch (Throwable $th) {
            Alert::error('Internal error', 'Contact support.');

            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(UserRegisterRequest $request, AuthService $authService)
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
