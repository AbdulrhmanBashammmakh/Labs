<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->all();
        $validator= Validator::make($input,['name' => "required",'email' => "required | email",'password' => "required ",]);

        if($validator -> fails()){
            return response()->json(
                ['success' => false,
                    'message'=> "sorry not stored",
                    "error"=> $validator->errors()]
            );
        }
        $user= new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make( $request->password);
        $user->save();

        return response()->json(
            ['success' => true,
                'message'=> "done",
                "user"=>  $user]
        );
    }

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
