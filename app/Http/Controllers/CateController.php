<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $cate= Cate::all();
        return response()->json(['success' => true,
            'data'=> $cate ,
            'status' => 200]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(
//            ['success' => true,
//            'data'=> $users ,
//            'status' => 200]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator= Validator::make($input,['cate' => "required"]);

        if($validator -> fails()){
            return response()->json(
            ['success' => false,
            'message'=> "sorry not stored",
                "error"=> $validator->errors()]
            );
        }
        $cate= new Cate;
        $cate->cate = $request->cate;
        $cate->save();

        return response()->json(
            ['success' => true,
                'message'=> "done",
                "Cate"=>  $cate]
        );
//

//        return redirect('/cate');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cate= Cate::find($id);
        if(is_null($cate)){
            return response()->json(
                ['success' => false,
                    'message'=> "sorry not found"]
            );
        }
        return response()->json(
            ['success' => true,
                'message'=> "done",
                "cate"=>  $cate]
        );
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cate $cate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cate $cate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cate $cate)
    {
        //
    }
}
