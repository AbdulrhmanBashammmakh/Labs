<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use Illuminate\Http\Request;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $cate= Cate::all();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cate $cate)
    {
        //
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
