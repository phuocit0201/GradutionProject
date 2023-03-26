<?php

namespace App\Services;

use App\Repository\Eloquent\OrderRepository;
class OrderService 
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * OrderService constructor.
     *
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get list order
        $list = $this->orderRepository->getAllOrders();
        $tableCrud = [
            'headers' => [
                [
                    'text' => 'Mã HD',
                    'key' => 'id',
                ],
                [
                    'text' => 'Tên KH',
                    'key' => 'user_name',
                ],
                [
                    'text' => 'Email',
                    'key' => 'user_email',
                ],
                [
                    'text' => 'Tổng Tiền',
                    'key' => 'total_money',
                ],
                [
                    'text' => 'PT Thanh Toán',
                    'key' => 'payment_name',
                ],
                [
                    'text' => 'Ngày Đặt Hàng',
                    'key' => 'created_at',
                ],
                [
                    'text' => 'Trạng Thái',
                    'key' => 'order_status',
                    'status' => [
                        [
                            'text' => 'Chờ Xử Lý',
                            'value' => 0,
                            'class' => 'badge badge-warning'
                        ],
                        [
                            'text' => 'Đang Giao Hàng',
                            'value' => 1,
                            'class' => 'badge badge-info'
                        ],
                        [
                            'text' => 'Đã Hủy',
                            'value' => 2,
                            'class' => 'badge badge-danger'
                        ],
                        [
                            'text' => 'Đã Nhận Hàng',
                            'value' => 3,
                            'class' => 'badge badge-success'
                        ],
                    ],
                ],
            ],
            'actions' => [
                'text'          => "Thao Tác",
                'create'        => false,
                'createExcel'   => false,
                'edit'          => true,
                'deleteAll'     => false,
                'delete'        => true,
                'viewDetail'    => false,
            ],
            'routes' => [
                'delete' => 'admin.category_delete',
                'edit' => 'admin.category_edit',
            ],
            'list' => $list,
        ];

        return [
            'title' => TextLayoutTitle("order"),
            'tableCrud' => $tableCrud,
        ];
    }

}
?>