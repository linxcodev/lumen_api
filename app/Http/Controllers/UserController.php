<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function detail($user)
    {
        $user = User::find($user);
        
        $data[] = ($user) ? [
          [
            'message' => 'Success show detail',
            'success' => true,
            'data' => $user
          ], 
          [200] 
        ]: [
          [
           'message' => 'User Tidak ditemukan',
           'success' => false,
           'data' => $user,
          ], 
          [400]
        ];
        
        return response()->json($data[0], $data[1]);
    }
}
