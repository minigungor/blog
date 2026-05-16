<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showUsers()
    {
        return view('admin.userlist', [
            'users' => User::all(),
        ]);
    }

    public function editUser(User $user)
    {
        return view('admin.useredit', [
            'user' => $user,
        ]);
    }

    public function saveUser(User $user, Request $request)
    {
        $validate = $request->validate([
            'name' => ['string', 'required'],
            'email' => ['email', 'required', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update($validate);

        return redirect()->action(
            [AdminController::class, 'showUsers']
        );

    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->action(
            [AdminController::class, 'showUsers']
        );
    }
}
