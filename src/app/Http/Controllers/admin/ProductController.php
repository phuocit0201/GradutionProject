<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $data = [
            'title' => TextLayoutTitle('create_product'),
        ];
        return view('admin.product.index', $data);
    }

    public function create()
    {
        //Rules form
        $rules = [
            'name' => [
                'required' => true,
            ],
            'price' => [
                'required' => true,
            ],
            'discount' => [
                'required' => true,
            ],
            'branch' => [
                'required' => true,
            ],
            'origin' => [
                'required' => true,
            ],
            'category' => [
                'required' => true,
            ],
            'summernote' => [
                'required' => true,
            ],
        ];

        // Messages eror rules
        $messages = [
            'name' => [
                'required' => __('message.required', ['attribute' => 'tên sản phẩm']),
            ],
            'price' => [
                'required' => __('message.required', ['attribute' => 'giá sản phẩm']),
            ],
            'branch' => [
                'required' => __('message.required', ['attribute' => 'thương hiệu sản phẩm']),
            ],
            'origin' => [
                'required' => __('message.required', ['attribute' => 'xuất xứ']),
            ],
            'category' => [
                'required' => __('message.required', ['attribute' => 'danh mục']),
            ],
            'summernote' => [
                'required' => __('message.required', ['attribute' => 'mô tả']),
            ],
            'discount' => [
                'required' => __('message.required', ['attribute' => 'giảm giá']),
            ],
        ];
        $data = [
            'rules' => $rules,
            'messages' => $messages,
            'title' => TextLayoutTitle('create_product'),
        ];
        return view('admin.product.create', $data);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
