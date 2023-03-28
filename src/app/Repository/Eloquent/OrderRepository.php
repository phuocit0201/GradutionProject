<?php

namespace App\Repository\Eloquent;

use App\Models\Order;
use App\Repository\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class OrderRepository
 * @package App\Repositories\Eloquent
 */
class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * OrderRepository constructor.
     *
     * @param Order $model
     */
    public function __construct(Order $order)
    {
        parent::__construct($order);
    }

    /**
     * Get all orders 
     */
    public function getAllOrders()
    {
        return DB::table('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('payments', 'orders.payment_id', '=', 'payments.id')
        ->select('users.name as user_name', 'users.email as user_email', 'payments.name as payment_name', 'orders.*')
        ->get();
    }

    /**
     * Get orders detail
     */
    public function getOrderDetail($id)
    {
        return DB::table('orders')
        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
        ->join('products_size', 'order_details.product_size_id', '=', 'products_size.id')
        ->join('sizes', 'products_size.size_id', '=', 'sizes.id')
        ->join('products_color', 'products_size.product_color_id', '=', 'products_color.id')
        ->join('colors', 'products_color.color_id', '=', 'colors.id')
        ->join('products', 'products_color.product_id', '=', 'products.id')
        ->select(
            'orders.*',
            'order_details.unit_price',
            'order_details.quantity',
            'sizes.name as size_name',
            'products_color.img as products_color_img',
            'colors.name as color_name',
            'products.name as product_name',
            'products.id as product_id',
        )
        ->where('orders.id', $id)
        ->get();
    }

    /**
     * Get customer information of the order
     */
    public function getInfoUserOfOrder($id)
    {
        return DB::table('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('addresses', 'users.id', '=', 'addresses.user_id')
        ->join('payments', 'orders.payment_id', '=', 'payments.id')
        ->select(
            'users.id as user_id',
            'users.name as user_name',
            'users.email as user_email',
            'users.phone_number as user_phone_number',
            'addresses.city as address_city',
            'addresses.district as address_district',
            'addresses.ward as address_ward',
            'addresses.apartment_number as address_apartment_number',
            'payments.name as payment_name',
            'orders.transport_fee as orders_transport_fee',
        )
        ->where('orders.id', $id)
        ->first();
    }
}

?>