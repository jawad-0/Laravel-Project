<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\product;
use Validator;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): JsonResponse
    {
        $posts = Product::all();
        return $this->sendResponse(ProductResource::collection($posts), 'Products retrieved successfully.');
        //return view ('products.index')->with('products', $posts);
        // $products = Product::latest()->paginate(5);
        // return view('products.index',compact('products'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
        // request()->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
        //Product::create($request->all());
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
       
        $product = Product::create($input);
        
        return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
        //return redirect()->route('products.index')
                        //->with('success','Product created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function show(Product $product): JsonResponse
    // {
    //     return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
    //     //return view('products.show',compact('product'));
    // }

    public function show($id): JsonResponse
    {
        $product = Product::find($id);
      
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
       
        return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Product $product): JsonResponse
    // {
    //      request()->validate([
    //         'name' => 'required',
    //         'detail' => 'required',
    //     ]);
    
    //     $product->update($request->all());
    
    //     return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
    //     //return redirect()->route('products.index')
    //                     //->with('success','Product updated successfully');
    // }

    public function update(Request $request, Product $product): JsonResponse
    {
        $input = $request->all();
       
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
       
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
       
        $product->name = $input['name'];
        $product->detail = $input['detail'];
        $product->save();
       
        return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return $this->sendResponse([], 'Product deleted successfully.');
        //return redirect()->route('products.index')
                        //->with('success','Product deleted successfully');
    }
}