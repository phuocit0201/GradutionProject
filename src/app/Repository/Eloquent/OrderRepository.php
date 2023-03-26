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
}

?>