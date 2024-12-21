<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\ShowProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(ProductFilterRequest $request, ProductFilter $filters): JsonResponse
    {
        $products = $this->productService->index($filters);

        return response()->json($products);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = $this->productService->create($request->all());

        return response()->json($product, Response::HTTP_CREATED);
    }

    public function show(ShowProductRequest $request): JsonResponse
    {
        $id = $request->validated()['id'];
        $product = $this->productService->get($id);

        return response()->json($product);
    }

    public function update(UpdateProductRequest $request, $id): JsonResponse
    {
        $product = $this->productService->update($id, $request->validated());

        return response()->json($product);
    }

    public function destroy(DeleteProductRequest $request): JsonResponse
    {
        $id = $request->validated()['id'];
        $this->productService->delete($id);

        return response()->json(['message' => "Product $id deleted successfully"], Response::HTTP_OK);
    }
}
