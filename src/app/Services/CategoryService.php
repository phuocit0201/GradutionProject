<?php

namespace App\Services;

use App\Helpers\TextSystemConst;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateStaffRequest;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Models\UserVerify;
use App\Notifications\VerifyUser;
use App\Repository\Eloquent\AddressRepository;
use App\Repository\Eloquent\AdminRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\UserRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use \Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class CategoryService 
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var AdminRepository
     */
    private $adminRepository;

    /**
     * @var AddressRepository
     */
    private $addressRepository;

    /**
     * AdminService constructor.
     *
     * @param UserRepository $userRepository
     * @param AdminRepository $adminRepository
     * @param AddressRepository $addressRepository
     */
    public function __construct(
        UserRepository $userRepository,
        AdminRepository $adminRepository,
        AddressRepository $addressRepository,
        CategoryRepository $categoryRepository,
    )
    {
        $this->userRepository = $userRepository;
        $this->adminRepository = $adminRepository;
        $this->addressRepository = $addressRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get list category
        $list = $this->categoryRepository->all();
        $tableCrud = [
            'headers' => [
                [
                    'text' => 'Mã DM',
                    'key' => 'id',
                ],
                [
                    'text' => 'Tên Danh Mục',
                    'key' => 'name',
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
                'create' => 'admin.category_create',
                'delete' => 'admin.category_delete',
                'edit' => 'admin.category_edit',
            ],
            'list' => $list,
        ];

        return [
            'title' => TextLayoutTitle("category"),
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
            // Fields form
            $fields = [
                [
                    'attribute' => 'name',
                    'label' => 'Tên Danh Mục',
                    'type' => 'text',
                ],
            ];
    
            //Rules form
            $rules = [
                'name' => [
                    'required' => true,
                    'minlength' => 1,
                    'maxlength' => 100,
                ],
            ];
    
            // Messages eror rules
            $messages = [
                'name' => [
                    'required' => __('message.required', ['attribute' => 'Tên danh mục']),
                    'minlength' => __('message.min', ['min' => 1, 'attribute' => 'Tên danh mục']),
                    'maxlength' => __('message.max', ['max' => 100, 'attribute' => 'Tên danh mục']),
                ],
            ];
    
            return [
                'title' => TextLayoutTitle("create_category"),
                'fields' => $fields,
                'rules' => $rules,
                'messages' => $messages,
            ];
        } catch (Exception) {
            return [];
        }
        
    }

    /** 
     * store the admin in the database.
     * @param App\Http\Requests\Admin\StoreCategoryRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $data = $request->validated();
            $this->categoryRepository->create($data);
            return redirect()->route('admin.category_index')->with('success', TextSystemConst::CREATE_SUCCESS);
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->route('admin.staffs_index')->with('error', TextSystemConst::CREATE_FAILED);
        }
    }

    /**
     * Show the form for creating a new user.
     *
     * @return array
     */
    public function edit(Category $category)
    {
        try {
            // Fields form
            $fields = [
                [
                    'attribute' => 'name',
                    'label' => 'Tên Danh Mục',
                    'type' => 'text',
                    'value' => $category->name,
                ],
            ];
    
            //Rules form
            $rules = [
                'name' => [
                    'required' => true,
                    'minlength' => 1,
                    'maxlength' => 100,
                ],
            ];
    
            // Messages eror rules
            $messages = [
                'name' => [
                    'required' => __('message.required', ['attribute' => 'Tên danh mục']),
                    'minlength' => __('message.min', ['min' => 1, 'attribute' => 'Tên danh mục']),
                    'maxlength' => __('message.max', ['max' => 100, 'attribute' => 'Tên danh mục']),
                ],
            ];
    
            return [
                'title' => TextLayoutTitle("edit_category"),
                'fields' => $fields,
                'rules' => $rules,
                'messages' => $messages,
                'category' => $category,
            ];
        } catch (Exception) {
            return [];
        }
        
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        try {
            $data = $request->validated();
            $this->categoryRepository->update($category, $data);
            return redirect()->route('admin.category_index')->with('success', TextSystemConst::UPDATE_SUCCESS);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return redirect()->route('admin.category_index')->with('error', TextSystemConst::UPDATE_FAILED);
        }
    }

     /** 
     * delete the user in the database.
     * @param Illuminate\Http\Request; $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try{
            if($this->categoryRepository->delete($this->categoryRepository->find($request->id))) {
                return response()->json(['status' => 'success', 'message' => TextSystemConst::DELETE_SUCCESS], 200);
            }

            return response()->json(['status' => 'failed', 'message' => TextSystemConst::DELETE_FAILED], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json(['status' => 'error', 'message' => TextSystemConst::SYSTEM_ERROR], 200);
        }
    }
}
?>