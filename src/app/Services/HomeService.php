<?php

namespace App\Services;

use App\Repository\Eloquent\ProductRepository;

class HomeService 
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get list payments
        $bellingProducts = $this->productRepository->getBestSellingProduct();
        return [
            'title' => TextLayoutTitle("payment_method"),
            'bellingProducts' => $bellingProducts,
        ];
    }
}
?>