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

    public function editUser(Request $request)
    {
        return view('admin.useredit', [
           'user' => User::where('email', $request->email)->first(),
        ]);
    }

    public function saveUser(Request $request)
    {

    }
}
