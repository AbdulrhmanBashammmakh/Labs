<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function login(Request $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['success' => false,
                'status' => 200]);
        }
        $user = auth()->user();
        $token = $user->createToken('token');
        return $token->plainTextToken;
    }


    public function getUsers(): \Illuminate\Http\JsonResponse
    {
        $users = User::all();
        return response()->json(['success' => true,
            'data'=> $users ,
            'status' => 200]);

    }

//    public function register(): \Illuminate\Http\JsonResponse
//    {
////        $users = User::all();
////        return response()->json(['success' => true,
////            'data'=> $users ,
////            'status' => 200]);
//
//    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
