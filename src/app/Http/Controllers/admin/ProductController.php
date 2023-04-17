<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @var ProductService
     */
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService =$productService;
    }

    public function index()
    {
        return view('admin.product.index', $this->productService->index());
    }

    public function create()
    {
        return view('admin.product.create', $this->productService->create());
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function getCategoryByParent(Request $request)
    {
        return response()->json($this->productService->getCategoryByParent($request), 200);
    }

    public function createColor()
    {
        return view('admin.product.color', $this->productService->createColor());
    }
}
