<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function authenticate(array $credentials)
    {
        if(Auth::attempt($credentials)) {

            request()->session()->regenerate();

            return redirect()->intended('users');
        }
    }

    public function store(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
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
