<?php

namespace App\Repository\Eloquent;

use App\Models\Payment;

/**
 * Class UserRepository
 * @package App\Repositories\Eloquent
 */
class PaymentRepository extends BaseRepository
{
    /**
     * PaymentRepository constructor.
     *
     * @param Payment $model
     */
    public function __construct(Payment $payment)
    {
        parent::__construct($payment);
    }
}

?>