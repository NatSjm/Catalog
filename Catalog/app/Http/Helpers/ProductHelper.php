<?php


namespace App\Http\Helpers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductHelper
{
    public function getCategory ($type)
    {
         if ($type === 'Shampoo' OR $type ==='SolidShampoo'){
             return 1;
         } elseif ($type === 'Toothpaste')
             return 2;
                else return 3;
    }

    public function create (ProductRequest $request) {
        $prefix = "App\\";
        $productableModel = $prefix.$request->type;

        $productData = $request->only('name', 'description', 'price', 'fragrance_id');
        $productData['category_id'] = $this->getCategory($request->type);

        $productableData = $request->except('fragrance_id', 'category_id', 'name', 'description', 'type', 'price');
        $productable = $productableModel::create($productableData);
        $product = $productable->products()->create($productData)->load('productable', 'category', 'fragrance');
        return $product;
    }

    public function update (ProductRequest $request, Product $product) {

        $productData = $request->only('name', 'description', 'price', 'fragrance_id');
        $productableData = $request->except('fragrance_id', 'category_id', 'name', 'description', 'type', 'price',
            '_method');

        $product->productable()->update($productableData);
        $product->update($productData);
        $product->refresh();
        return $product->load('productable', 'category', 'fragrance');

    }
}
