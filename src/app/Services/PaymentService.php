<?php

namespace App\Services;

use App\Repository\Eloquent\PaymentRepository;
class PaymentService 
{
    /**
     * @var PaymentRepository
     */
    private $paymentRepository;

    /**
     * PaymentService constructor.
     *
     * @param PaymentRepository $paymentRepository
     */
    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get list payments
        $list = $this->paymentRepository->all();
        $tableCrud = [
            'headers' => [
                [
                    'text' => 'Mã PTTT',
                    'key' => 'id',
                ],
                [
                    'text' => 'Phương Thức Thanh Toán',
                    'key' => 'name',
                ],
            ],
            'actions' => [
                'text'          => "Thao Tác",
                'create'        => false,
                'createExcel'   => false,
                'edit'          => false,
                'deleteAll'     => false,
                'delete'        => false,
                'viewDetail'    => false,
            ],
            'routes' => [],
            'list' => $list,
        ];

        return [
            'title' => TextLayoutTitle("payment_method"),
            'tableCrud' => $tableCrud,
        ];
    }
}
?>