<?php

namespace App\Repository\Eloquent;

use App\Models\Color;
use App\Models\Product;
use App\Repository\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class ColorRepository
 * @package App\Repositories\Eloquent
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * ProductRepository constructor.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

        /**
     * Get best selling product
     */
    public function getBestSellingProduct()
    {
        return DB::select('
        select sum(order_details.quantity) as sum, products.id, products.name, products.price_sell, products.img from products 
        join products_color on products.id = products_color.product_id
        join products_size on products_color.id = products_size.product_color_id
        join order_details on products_size.id = order_details.product_size_id
        join orders on orders.id = order_details.order_id
        where orders.order_status = 3
        group by products.id, products.name, products.price_sell, products.img
        order by sum desc
        ');
    }
}

?>