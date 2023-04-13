<?php

namespace App\Services;

use App\Models\Product;
use App\Repository\Eloquent\ProductRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductDetailService 
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var ProductReviewService
     */
    private $productReviewService;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository, ProductReviewService $productReviewService)
    {
        $this->productRepository = $productRepository;
        $this->productReviewService = $productReviewService;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $productSold = $this->productRepository->getTotalProductSoldById($product->id);
        $productColor = DB::table('products_color')
            ->join('colors', 'colors.id', 'products_color.color_id')
            ->select('colors.name as color_name', 'products_color.*')
            ->where('products_color.product_id', $product->id)
            ->get();
        $productsize = DB::table('products_color')
            ->join('products_size', 'products_size.product_color_id', 'products_color.id')
            ->join('sizes', 'sizes.id', 'products_size.size_id')
            ->select('sizes.name as size_name', 'products_size.id as product_size_id', 'products_color.id as product_color_id', 'products_size.quantity')
            ->where('products_color.product_id', $product->id)
            ->get();
        $checkReviewProduct = false;
        if (! $this->productReviewService->checkProductReview($product)) {
            $checkReviewProduct = true;
        }
        return [
            'title' => TextLayoutTitle("payment_method"),
            'productSold' => $productSold,
            'productColor' => $productColor,
            'productSize' => $productsize,
            'product' => $product,
            'checkReviewProduct' => $checkReviewProduct
        ];
    }
}
?>