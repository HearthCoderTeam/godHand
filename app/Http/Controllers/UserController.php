<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function create(Request $request)
    {
        try {
            $request->validate([
                'name'    => 'required|min:4|string',
                'role_id' => 'numeric|required',
                'email'   => 'string|required|unique:users',
                'password' => 'required|string',
            ]);

            User::create([
                'name'     => $request->name,
                'role_id'  => $request->role_id,
                'email'    => $request->email,
                'password' => $request->password,
            ]);
        } catch (\Throwable $e) {
            return $this->returnResponse('error', $e->getMessage());
        }

        return $this->returnResponse('success', 'User has added successfully');
    }

    public function returnResponse(string $state, string $message): Response
    {
        return new Response([
            'state'   => $state,
            'message' => $message,
        ]);
    }
}
