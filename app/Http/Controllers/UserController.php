<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;


class UserController extends Controller
{
    public function index()
    {
        $users = User::with('posts')->get();
    
        return response()->json([
            'status' => 200,
            'data' => $users,
            'message' => 'Barcha foydalanuvchilar muvaffaqiyatli olindi'
        ]);
    }

    public function store(StoreUserRequest $request)
{
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return response()->json([
        'status' => 201,
        'data' => $user,
        'message' => 'Foydalanuvchi muvaffaqiyatli yaratildi'
    ], 201);
}
public function show(User $user)
{
    return response()->json([
        'status' => 200,
        'data' => $user->load('posts'),
        'message' => 'Foydalanuvchi topildi'
    ]);
}

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:6'
        ]);

        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return response()->json([
            'status' => 200,
            'data' => $user,
            'message' => 'Foydalanuvchi yangilandi'
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Foydalanuvchi ochirildi'
        ]);
    }
}
