<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the user.
     */
    public function index()
    {
        $users = User::get();
        return view('admin/users', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('admin/add_user');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['active'] = true;
        $data['email_verified_at'] = now();
        $data['password'] = Hash::make($data['password']);

        user::create($data);

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return view('admin/edit_user', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users,user_name,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'active' => 'required:boolean',
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {unset($data['password']);}

        User::where('id', $id)->update($data);
        return redirect()->route('users.index');
    }

}
