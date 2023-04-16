<?php

namespace App\Services;

use App\Helpers\TextSystemConst;
use App\Http\Requests\Admin\StoreCommonRequest;
use App\Models\Brand;
use App\Repository\Eloquent\BrandRepository;
use App\Repository\Eloquent\ProductRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductService 
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get list products
        $list = $this->productRepository->all();
        $tableCrud = [
            'headers' => [
                [
                    'text' => 'Mã SP',
                    'key' => 'id',
                ],
                [
                    'text' => 'Tên SP',
                    'key' => 'name',
                ],
                [
                    'text' => 'Hình ảnh',
                    'key' => 'img',
                    'img' => [
                        'url' => 'asset/client/images/products/small/',
                        'style' => 'width: 100px;'
                    ],
                ],
                [
                    'text' => 'Giá',
                    'key' => 'price_sell',
                    'format' => true,
                ],
                [
                    'text' => 'Trạng Thái',
                    'key' => 'status',
                    'status' => [
                        [
                            'text' => 'Hoạt động',
                            'value' => 1,
                            'class' => 'badge badge-success'
                        ],
                        [
                            'text' => 'Tạm dừng',
                            'value' => 0,
                            'class' => 'badge badge-danger'
                        ],
                    ],
                ],
            ],
            'actions' => [
                'text'          => "Thao Tác",
                'create'        => true,
                'createExcel'   => false,
                'edit'          => true,
                'deleteAll'     => true,
                'delete'        => true,
                'viewDetail'    => false,
            ],
            'routes' => [
                'create' => 'admin.products_create',
                'delete' => 'admin.brands_delete',
                'edit' => 'admin.brands_edit',
            ],
            'list' => $list,
        ];

        return [
            'title' => TextLayoutTitle("product"),
            'tableCrud' => $tableCrud,
        ];
    }

    /**
     * Show the form for creating a new user.
     *
     * @return array
     */
    public function create()
    {
        try {
            return [
                'title' => TextLayoutTitle("create_product"),
            ];
        } catch (Exception) {
            return [];
        }
        
    }
}
?>