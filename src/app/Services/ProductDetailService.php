<?php

namespace App\Services;

use App\Models\Product;
use App\Repository\Eloquent\ProductRepository;
use App\Repository\Eloquent\ProductReviewRepository;
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
     * @var ProductReviewRepository
     */
    private $productReviewReprository;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(
        ProductRepository $productRepository,
        ProductReviewService $productReviewService,
        ProductReviewRepository $productReviewRepository,
    )
    {
        $this->productRepository = $productRepository;
        $this->productReviewService = $productReviewService;
        $this->productReviewReprository = $productReviewRepository;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $productSold = $this->productRepository->getTotalProductSoldById($product->id);
        // get products color
        $productColor = DB::table('products_color')
            ->join('colors', 'colors.id', 'products_color.color_id')
            ->select('colors.name as color_name', 'products_color.*')
            ->where('products_color.product_id', $product->id)
            ->get();
        // get product size
        $productsize = DB::table('products_color')
            ->join('products_size', 'products_size.product_color_id', 'products_color.id')
            ->join('sizes', 'sizes.id', 'products_size.size_id')
            ->select('sizes.name as size_name', 'products_size.id as product_size_id', 'products_color.id as product_color_id', 'products_size.quantity')
            ->where('products_color.product_id', $product->id)
            ->get();
        // get ratings by product
        $ratingsByProduct = $this->productReviewReprository->getRatingByProduct($product->id);

        // rating statistics
        $ratingStatistics = [
            "1" => 0,
            "2" => 0,
            "3" => 0,
            "4" => 0,
            "5" => 0,
        ];

        //Average product rating
        $totalRating = 0;
        $totalNumberReview = 0;
        foreach ($ratingsByProduct as $rating) {
            $ratingStatistics[$rating->rating] = $rating->sum;
            $totalRating += $rating->rating * $rating->sum;
            $totalNumberReview += $rating->sum;
        }
        $avgRating = count($ratingsByProduct) > 0 ? $totalRating / $totalNumberReview : 5;

        //check if the user is allowed to rate the product
        $checkReviewProduct = false;
        if (! $this->productReviewService->checkProductReview($product)) {
            $checkReviewProduct = true;
        }

        //get product reviews by product
        $productReviews = $this->productReviewReprository->getProductReview($product->id);

        //get related products
        $relatedProducts = $this->productRepository->getRelatedProducts($product);
        return [
            'title' => TextLayoutTitle("payment_method"),
            'productSold' => $productSold,
            'productColor' => $productColor,
            'productSize' => $productsize,
            'product' => $product,
            'checkReviewProduct' => $checkReviewProduct,
            'ratingStatistics' => $ratingStatistics,
            'avgRating' => $avgRating,
            'productReviews' => $productReviews,
            'relatedProducts' => $relatedProducts,
        ];
    }
}
?>