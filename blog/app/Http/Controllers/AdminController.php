<?php

namespace App\Http\Controllers;

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

    public function saveUser(User $user)
    {
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->action(
            [AdminController::class, 'showUsers']
        );
    }
}
