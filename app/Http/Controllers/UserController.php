<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        $user->load('posts'); 
    
        return response()->json([
            'status' => 200,
            'data' => $user,
            'message' => 'Foydalanuvchi malumotlari va postlari'
        ]);
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
