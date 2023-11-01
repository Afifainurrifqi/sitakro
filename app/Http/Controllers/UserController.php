<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
{
    return view('users.create');
}

public function store(Request $request)
{
    // Validasi data yang diterima dari formulir
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    // Simpan data pengguna ke database
    $user = new User([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);
    $user->save();

    return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan');
}
}
