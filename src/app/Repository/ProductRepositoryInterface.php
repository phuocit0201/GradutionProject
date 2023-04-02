<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface ProductRepositoryInterface
 * @package App\Repositories
 */
interface ProductRepositoryInterface
{
    /**
     * Get best selling product
     */
    public function getBestSellingProduct();

    /**
     * Get new products
     */
    public function getNewProducts();
}
?>