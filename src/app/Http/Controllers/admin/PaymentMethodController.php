<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * @var PaymentService
     */
    private $paymentService;

    /**
     * BrandController constructor.
     *
     * @param PaymentService $paymentService
     */
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    
    public function index()
    {
        return view('admin.payment.index', $this->paymentService->index());
    }
}
