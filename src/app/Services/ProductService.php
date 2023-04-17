<?php

namespace App\Services;

use App\Repository\Eloquent\BrandRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\ColorRepository;
use App\Repository\Eloquent\ProductRepository;
use Exception;
use Illuminate\Http\Request;

class ProductService 
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var BrandRepository
     */
    private $brandRepository;

    /**
     * @var ColorRepository
     */
    private $colorRepository;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(
        ProductRepository $productRepository, 
        CategoryRepository $categoryRepository,
        BrandRepository $brandRepository,
        ColorRepository $colorRepository,
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        $this->colorRepository = $colorRepository;
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
            $categoriesParent = category_header();
            $brands = $this->brandRepository->all();
            //Rules form
            $rules = [
                'name' => [
                    'required' => true,
                ],
                'price_import' => [
                    'required' => true,
                ],
                'price_sell' => [
                    'required' => true,
                ],
                'branch' => [
                    'required' => true,
                ],
                'origin' => [
                    'required' => true,
                ],
                'category_id' => [
                    'required' => true,
                ],
                'summernote' => [
                    'required' => true,
                ],
                'file-input' => [
                    'required' => true,
                ],
            ];

            // Messages eror rules
            $messages = [
                'name' => [
                    'required' => __('message.required', ['attribute' => 'tên sản phẩm']),
                ],
                'price_import' => [
                    'required' => __('message.required', ['attribute' => 'giá nhập sản phẩm']),
                ],
                'price_sell' => [
                    'required' => __('message.required', ['attribute' => 'giá bán sản phẩm']),
                ],
                'branch' => [
                    'required' => __('message.required', ['attribute' => 'thương hiệu sản phẩm']),
                ],
                'origin' => [
                    'required' => __('message.required', ['attribute' => 'xuất xứ']),
                ],
                'category_id' => [
                    'required' => __('message.required', ['attribute' => 'danh mục']),
                ],
                'summernote' => [
                    'required' => __('message.required', ['attribute' => 'mô tả']),
                ],
                'file-input' => [
                    'required' => __('message.required', ['attribute' => 'hình ảnh']),
                ],
            ];
            return [
                'title' => TextLayoutTitle("create_product"),
                'categoriesParent' => $categoriesParent,
                'messages' => $messages,
                'rules' => $rules,
                'brands' => $brands,
            ];
        } catch (Exception) {
            return [];
        }
    }

    public function getCategoryByParent(Request $request)
    {
        try {
            return $this->categoryRepository->where(['parent_id' => $request->parent_id]);
        } catch (Exception) {
            return null;
        }
    }

    public function createColor()
    {
        $colors = $this->colorRepository->all();
        return [
            'title' => 'Màu Sản Phẩm',
            'colors' => $colors
        ];
    }
}
?>