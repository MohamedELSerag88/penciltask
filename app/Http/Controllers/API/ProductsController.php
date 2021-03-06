<?php

namespace App\Http\Controllers\API;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Attribute;
use Guid;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Guid::create();
        $products = Product::all();
        return response()->json($products, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['hashid'] = Guid::create();
        $product = Product::create($input);
        if(isset($input['attributes']) && count($input['attributes'])){
            unset($input['attributes'][0]);
            $input['attributes'] = array_map(array($this, 'getCustomValue'),$input['attributes']);
            $product->otherattributes()->attach($input['attributes']);
        }
       
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::where('hashid', $id)->first();
        $attributes = $product->otherattributes;

        return response()->json( ['product'=>$product, 'attributes' => $attributes], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::where('hashid', $id)->first();
        $attributes = $product->otherattributes;
        $allattribute = \App\Attribute::all();
        return response()->json(['allattribute' => $allattribute,'product'=>$product, 'attributes' => $attributes], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $product = Product::where('hashid', $id)->first();
        $product->name = $input['name'];
        $product->code = $input['code'];
        $product->price = $input['price'];
        $product->description = $input['description'] ?? '';
        $product->save();
        if(isset($input['attributes']) && count($input['attributes'])){
            $product->otherattributes()->detach();
            $input['attributes'] = array_map(array($this, 'getCustomValue'),$input['attributes']);
            $product->otherattributes()->attach($input['attributes']);
        }
        
        return response()->json($product, 200);        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::where('hashid', $id)->first()->delete();
        return response()->json("Done", 200);
    }

    public function createcustom(Request $request){
        $input = $request->all();
        $attribute = Attribute::create($input);
        return response()->json($attribute, 201);

    }

    public function getCustomValue($value){
        return ['value' => $value];
    }


    public function uploadimage(Request $request,$id){
        $product = Product::find($id);
        $file=$request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move('uploads/' , $fileName );
        $image = '/uploads/' . $fileName;
        $product->image =  $image;
        $product->save();
        return response()->json($product, 200);

    }
}
