<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Http\Helpers\ProductHelper;
use App\Filters\ProductFilter;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    protected $helper;

    public function __construct (ProductHelper $helper)
    {
        $this->helper = $helper;
    }




    public function index(Request $request, ProductFilter $filters)
    {
        $filteredProducts = Product::with(['productable', 'category', 'fragrance'])->filter($filters);
        $products = $filteredProducts->orderBy('id', 'desc')->cursorPaginate(12);
        return ProductResource::collection($products);


    }

    public function store(ProductRequest $request)
    {
         $this->authorize('create', Product::class);
         $product = $this->helper->create($request);

        return response()->json([
            'product' => new ProductResource($product),
            'user' => auth()->id()
        ]);
    }


    public function show(Product $product)
    {

        $product = $product->load('productable', 'category', 'fragrance');


        return response()->json([
            'product' => new ProductResource($product),
        ]);
    }


    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);

        $product = $this->helper->update($request, $product);

        return response()->json([
            'product' => new ProductResource($product)
        ]);

    }


    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->productable()->delete();
        $product->delete();

        return response()->json(null, 204);
    }
}
