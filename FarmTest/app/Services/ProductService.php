<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{

    public function index($filters = null): Collection
    {
        return Product::filter($filters)->get();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function get($id)
    {
        return Product::findOrFail($id);
    }

    public function update($id, $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);

        return $product;
    }

    public function delete($id): void
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}
