<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UserRegisterRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('app.users.index', compact('users'));
    }

    public function create()
    {
        return view('app.users.create');
    }

    public function store(UserRegisterRequest $request, UserService $userService)
    {
        try {
            DB::beginTransaction();

            $userService->store($request->only('name', 'email', 'password'));

            DB::commit();

            Alert::success('Success', 'User created successfully');

            return redirect()->route('users.index');
        } catch (Throwable $th) {
            DB::rollBack();

            Alert::error('Internal error', 'Contact support.');

            return back();
        }
    }

    public function showEdit(User $user)
    {
        return view('app.users.show-edit', compact('user'));
    }

    public function update(User $user, UserUpdateRequest $request, UserService $userService)
    {
        try {
            DB::beginTransaction();

            $userService->update($user, $request->only('name', 'email', 'new_password'));

            DB::commit();

            Alert::success('Success', 'User updated successfully');

            return redirect()->route('users.show-edit', $user->id);
        } catch (Throwable $th) {
            DB::rollBack();

            Alert::error('Internal error', 'Contact support.');

            return back();
        }

        return view('app.users.show-edit', compact('user'));
    }

    public function delete(User $user, UserService $userService)
    {
        try {
            DB::beginTransaction();

            $userService->delete($user);

            DB::commit();

            Alert::success('Success', 'User deleted successfully');

            return redirect()->route('users.index');
        } catch (Throwable $th) {
            DB::rollBack();

            Alert::error('Internal error', 'Contact support.');

            return back();
        }
    }
}
