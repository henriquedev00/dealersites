<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class AuthService
{
    public function authenticate(array $credentials)
    {
        if(Auth::attempt($credentials)) {

            request()->session()->regenerate();

            return redirect()->intended('users');
        }

        throw new UnauthorizedException();
    }

    public function store(array $data)
    {
        $user = User::create([
            'name' => ucwords(trim($data['name'])),
            'email' => trim($data['email']),
            'password' => bcrypt($data['password'])
        ]);

        if($user) {
            return $this->authenticate([
                'email' => $user->email,
                'password' => $data['password']
            ]);
        }
    }
}
