<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface OrderRepositoryInterface
 * @package App\Repositories
 */
interface OrderRepositoryInterface
{
    /**
     * Get all orders 
     */
    public function getAllOrders();

    /**
     * Get orders detail
     */
    public function getOrderDetail($id);

    /**
     * Get customer information of the order
     */
    public function getInfoUserOfOrder($id);
}
?>