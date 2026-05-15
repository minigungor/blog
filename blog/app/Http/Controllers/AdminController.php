<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Request;

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

    }
}
