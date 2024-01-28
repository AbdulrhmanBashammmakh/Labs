<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unit= Unit::all();
        return response()->json(['success' => true,
            'data'=> $unit ,
            'status' => 200]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator= Validator::make($input,['name' => "required"]);

        if($validator -> fails()){
            return response()->json(
                ['success' => false,
                    'message'=> "sorry not stored",
                    "error"=> $validator->errors()]
            );
        }
        $unit= new Unit();
        $unit->name = $request->name;
        $unit->save();

        return response()->json(
            ['success' => true,
                'message'=> "done",
                "unit"=>  $unit]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $unit= Unit::find($id);
        if(is_null($unit)){
            return response()->json(
                ['success' => false,
                    'message'=> "sorry not found"]
            );
        }
        return response()->json(
            ['success' => true,
                'message'=> "done",
                "unit"=>  $unit]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
