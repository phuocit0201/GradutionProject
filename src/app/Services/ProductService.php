<?php

namespace App\Services;

use App\Http\Requests\Admin\StoreProductColorRequest;
use App\Http\Requests\Admin\UpdateProductColorRequest;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Repository\Eloquent\BrandRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\ColorRepository;
use App\Repository\Eloquent\ProductRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function createColor(Product $product)
    {
        $colors = Color::whereNotIn('id', function($query) use($product) {
            $query->select('color_id')
                  ->from('products_color')
                  ->where('product_id', '=', $product->id)
                  ->whereNull('deleted_at');
        })
        ->get();
        $productColors = ProductColor::all();
        return [
            'title' => 'Màu Sản Phẩm',
            'colors' => $colors,
            'product' => $product,
            'productColors' => $productColors,
            'routeSize' => route('admin.products_size', $product->id),
        ];
    }

    public function storeColor(StoreProductColorRequest $request, Product $product)
    {
        try {
            $imageName = time().'.'.request()->img->getClientOriginalExtension();
            $colorId = $request->color_id;
            request()->img->move(public_path('asset/client/images/products/small'), $imageName);
            $checkColorExist = $this->productRepository->checkProductColorExist($product->id, $colorId);
            if ($checkColorExist > 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Màu này đã tồn tại'
                ], 200);
            }
            ProductColor::create([
                'img' => $imageName,
                'color_id' => $colorId,
                'product_id' => $product->id
            ]);
            Session::flash('success', 'Thêm màu thành công');
            return response()->json([
                'status' => true,
                'route' => route('admin.products_color', $product->id),
            ], 200);
        } catch (Exception) {
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra vui lòng thử lại'
            ], 200);
        }
    }

    public function editColor(ProductColor $productColor)
    {
        $colors = Color::whereNotIn('id', function($query) use($productColor) {
            $query->select('color_id')
                  ->from('products_color')
                  ->where('product_id', '=', $productColor->product_id)
                  ->where('color_id', '!=', $productColor->color_id)
                  ->whereNull('deleted_at');
        })
        ->get();
        return response()->json([
            'productColor' => $productColor,
            'colors' => $colors
        ], 200);
    }

    public function updateColor(UpdateProductColorRequest $request, ProductColor $productColor)
    {
        try {
            $data = $request->validated();
            if ($request->img) {
                $imageName = time().'.'.request()->img->getClientOriginalExtension();
                request()->img->move(public_path('asset/client/images/products/small'), $imageName);
                $data['img'] = $imageName;
            }
            $productColor->update($data);
            Session::flash('success', 'Thêm màu thành công');
            return response()->json([
                'status' => true,
                'route' => route('admin.products_color', $productColor->product_id),
            ], 200);
        } catch (Exception) {
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra vui lòng thử lại'
            ], 200);
        }
    }

    public function deleteColor(ProductColor $productColor)
    {
        if ($productColor->delete()) {
            $data = [
                'status' => true,
                'message' => 'Xóa màu thành công'
            ];
        } else {
            $data = [
                'status' => false,
                'message' => 'Xóa thất bại vui lòng kiểm tra lại'
            ];
        }
        return response()->json($data, 200);
    }

    public function createSize(Product $product)
    {
        $productSizes = ProductSize::join('products_color', 'products_color.id', '=', 'products_size.product_color_id')
        ->join('products', 'products.id', '=', 'products_color.product_id')
        ->where('products.id', $product->id)
        ->first();
        dd($productSizes->color->name);
        return [
            'title' => 'Kích thước sản phẩm',
            'routeColor' => route('admin.products_color', $product->id)
        ];
    }
}
?>