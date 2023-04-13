<?php

namespace App\Repository\Eloquent;

use App\Models\ProductReview;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductReviewRepository
 * @package App\Repositories\Eloquent
 */
class ProductReviewRepository extends BaseRepository
{
    /**
     * ProductReviewRepository constructor.
     *
     * @param ProductReview $productReview
     */
    public function __construct(ProductReview $productReview)
    {
        parent::__construct($productReview);
    }

    public function checkUserBuyProduct($productId, $userId)
    {
        return DB::select("
            select * from products 
            join products_color on products.id = products_color.product_id
            join products_size on products_color.id = products_size.product_color_id
            join order_details on order_details.product_size_id = products_size.id
            join orders on orders.id = order_details.order_id
            where orders.order_status = 3 and products.id = $productId and orders.user_id = $userId;
        ");
    }

    public function checkUserProductReview($productId, $userId)
    {
        return $this->model->join('products', 'products.id', '=', 'product_reviews.product_id')
        ->where('product_reviews.product_id', $productId)->where('product_reviews.user_id', $userId)->count();
    }
}

?>