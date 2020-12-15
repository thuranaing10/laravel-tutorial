<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Product;
use Validator;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::find(7);
        return response()->json([
                    'name' => $products['name'],
                    'detail' => $products['detail'],
                    'message'=> 'Products retrieved successfully'
                ]);
        //return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $product = Product::create($input);

        return response()->json([
                    'name' => $product['name'],
                    'detail' => $product['detail'],
                    'message'=> 'Product created successfully',

                ]);
   
        //return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
    } 
    public function show($id)
    {
        $product = Product::find($id);
  
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }

        return response()->json([
                    'name' => $product['name'],
                    'detail' => $product['detail'],
                    'message'=> 'Products retrieved successfully'
                ]);
    
        //return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
    }
    public function update(Request $request, Product $product)
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
        

        return response()->json([
                    'name' => $product['name'],
                    'detail' => $product['detail'],
                    'message'=> 'Products updated successfully'
                ]);
        //return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return 'Product deleted successfully';
        //return $this->sendResponse([], 'Product deleted successfully.');
    }
}
