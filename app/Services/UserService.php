<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function store(array $data): void
    {
        User::create([
            'name' => ucwords(trim($data['name'])),
            'email' => trim($data['email']),
            'password' => bcrypt($data['password'])
        ]);
    }

    public function update(User $user, array $data): void
    {
        $user->update([
            'name' => ucwords(trim($data['name'])),
            'email' => trim($data['email']),
        ]);

        if(!is_null($data['new_password'])) {
            $user->update([
                'password' => bcrypt($data['new_password'])
            ]);
        }
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}
