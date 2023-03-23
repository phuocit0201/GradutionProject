<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * @var BrandService
     */
    private $brandService;

    /**
     * BrandController constructor.
     *
     * @param BrandService $brandService
     */
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }
    
    public function index()
    {
        return view('admin.brand.index', $this->brandService->index());
    }

    public function create()
    {
        if (count($this->brandService->create()) > 0) {
            return view('admin.brand.create', $this->brandService->create());
        }

        return redirect()->route('admin.brands_index');
    }

    public function store(StoreCategoryRequest $request)
    {
        return $this->brandService->store($request);
    }

    public function edit(Brand $brand)
    {
        if (count($this->brandService->edit($brand)) > 0){
            return view('admin.brand.edit',$this->brandService->edit($brand));
        }

        return redirect()->route('admin.brands_index');
    }

    public function update(StoreCategoryRequest $request, Brand $brand)
    {
        return $this->brandService->update($request, $brand);
    }

    public function delete(Request $request)
    {
        return $this->brandService->delete($request);
    }
}
