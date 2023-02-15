<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TextSystemConst;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
     /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get list customers
        $list = $this->userService->all();
        $tableCrud = [
            'headers' => [
                [
                    'text' => 'Mã KH',
                    'key' => 'id',
                ],
                [
                    'text' => 'Tên Khách Hàng',
                    'key' => 'name',
                ],
                [
                    'text' => 'Email',
                    'key' => 'email',
                ],
                [
                    'text' => 'Số Điện Thoại',
                    'key' => 'phone_number',
                ],
                [
                    'text' => 'Trạng Thái',
                    'key' => 'active',
                    'status' => [
                        [
                            'text' => 'Hoạt động',
                            'value' => 1,
                            'class' => 'badge badge-success'
                        ],
                        [
                            'text' => 'Vô hiệu hóa',
                            'value' => 0,
                            'class' => 'badge badge-danger'
                        ],
                    ],
                ],
            ],
            'actions' => [
                'text'          => "Thao Tác",
                'create'        => true,
                'createExcel'   => true,
                'edit'          => true,
                'deleteAll'     => true,
                'delete'        => true,
                'viewDetail'    => true,
            ],
            'list' => $list,
        ];

        $dataView = [
            'title'             => TextLayoutTitle("customer"),
            'tableCrud'           => $tableCrud,
        ];

        return view('admin.user.index', $dataView);
    }
}
