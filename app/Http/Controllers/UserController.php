<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
//        ambil data user yang login
        $user = auth()->user();
        return view('pages.user.index', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $user = User::findOrFail(auth()->user()->id);
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'type' => $data['type'],
            'password' => $data['password'] ? bcrypt($data['password']) : $user->password,
        ]);
        return redirect()->route('user.profile')->with('success', 'User updated successfully');
    }
}
