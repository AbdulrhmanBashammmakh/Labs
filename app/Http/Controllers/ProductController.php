<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        $products =Product::with('category')->orderBy('id','desc')->paginate(4);
//        return view('pro.index')->with('products', $products);
//     $products= Product::query()->paginate(5);
//     return view('products.index',compact('products'))->with('i',(request()->input('page',1)-1)*5);
      //  $product= Product::all();
        $product= Product::query()->paginate(10);
        return response()->json(['success' => true,
            'current_page' => $product->currentPage(),
            'lastPage' => $product->lastPage(),
            'hasMorePages' => $product->hasMorePages(),
            'data'=> $product->items() ,
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
        $validator= Validator::make($input,['name' => "required", 'cata_id' => "required", 'unit_id' => "required"]);

        if($validator -> fails()){
            return response()->json(
                ['success' => false,
                    'message'=> "sorry not stored",
                    "error"=> $validator->errors()]
            );
        }
        $product=new  Product;

        $product->name = $request->name;
        $product->cata_id = $request->cata_id;
        $product->unit_id = $request->unit_id;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->save();

        return response()->json(
            ['success' => true,
                'message'=> "done",
                "Cate"=>  $product]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
