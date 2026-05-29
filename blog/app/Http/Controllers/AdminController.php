<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.userlist', [
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        return redirect('/register');
    }

    public function store(Request $request)
    {
        $user = new User($this->validateUser($request));
        $user->save();

        return redirect()->action(
            [AdminController::class, 'index']
        );
    }

    public function show(User $user)
    {
        return view('admin.showuser', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.useredit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['string', 'required'],
            'email' => ['email', 'required', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update($validated);

        return redirect()->action(
            [AdminController::class, 'index']
        );
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->action(
            [AdminController::class, 'index']
        );
    }

    public function validateUser(Request $request)
    {
        return $request->validate([
            'name' => ['string', 'required'],
            'email' => ['email', 'required', Rule::unique('users')],
        ]);
    }

    public function toggleBlock(User $user)
    {
        $user->update([
            'is_blocked' => !$user->is_blocked,
        ]);

        return redirect()->back();
    }

}
