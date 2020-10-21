<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Http\Helpers\ProductHelper;
use App\Filters\ProductFilter;
//use App\Shampoo;
//use App\SolidShampoo;
//use App\Soap;
//use App\LiquidSoap;
//use App\Toothpaste;
use Illuminate\Support\Str;
//use App\Category;

class ProductController extends Controller
{
    protected $helper;

    public function __construct (ProductHelper $helper)
    {
        $this->helper = $helper;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ProductFilter $filters)
    {
        $filteredProducts = Product::with(['productable', 'category', 'fragrance'])->latest('updated_at')->filter($filters);
        $products = $filteredProducts->paginate(100);
        return ProductResource::collection($products);
      // return $products;

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
         $product = $this->helper->create($request);

        return response()->json([
            'product' => new ProductResource($product)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        $product = $product->load('productable', 'category', 'fragrance');


        return response()->json([
            'product' => new ProductResource($product),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
       // return $request->all();
        $product = Product::findOrFail($id);

        $product = $this->helper->update($request, $product);

        return response()->json([
            'product' => new ProductResource($product)
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->productable()->delete();
        $product->delete();

        return response()->json(null, 204);
    }
}
