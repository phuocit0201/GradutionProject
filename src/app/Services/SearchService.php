<?php

namespace App\Services;

use App\Repository\Eloquent\BrandRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\ProductRepository;
use Illuminate\Http\Request;

class SearchService 
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var BrandRepository
     */
    private $brandRepository;

    /**
     * SearchService constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(
        ProductRepository $productRepository, 
        CategoryRepository $categoryRepository,
        BrandRepository $brandRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $categories = $this->categoryRepository->all();
        $brands = $this->brandRepository->all();
        
        $keyword = $request->keyword ?? null;
        $category = $request->category ?? null;
        $minPrice = $request->min_price ?? null;
        $maxPrice = $request->max_price ?? null;
        $brand = $request->brand ?? null;
    
        $products = $this->productRepository->getProductSearch($keyword, $category, $minPrice, $maxPrice, $brand);
        return [
            'contentSearch' => $request->keyword,
            'products' => $products,
            'keyword' => $keyword,
            'category' => $category,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'brand' => $brand,
            'categories' => $categories,
            'brands' => $brands,
        ];
    }
}
?>