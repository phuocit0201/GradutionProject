<?php

namespace App\Services;

use App\Http\Requests\Admin\StoreUserRequest;
use App\Models\Role;
use App\Models\UserVerify;
use App\Notifications\VerifyUser;
use App\Repository\Eloquent\AddressRepository;
use App\Repository\Eloquent\UserRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use \Illuminate\Support\Facades\Config;
class UserService 
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var AddressRepository
     */
    private $addressRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     * @param AddressRepository $addressRepository
     */
    public function __construct(UserRepository $userRepository, AddressRepository $addressRepository)
    {
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get list customers
        $list = $this->userRepository->all();
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
            'routes' => [
                'create' => 'admin.users_create',
            ],
            'list' => $list,
        ];

        return [
            'title' => TextLayoutTitle("customer"),
            'tableCrud' => $tableCrud,
        ];
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fields form
        $fields = [
            [
                'attribute' => 'name',
                'label' => 'Họ Và Tên',
                'type' => 'text',
            ],
            [
                'attribute' => 'email',
                'label' => 'Email',
                'type' => 'email',
            ],
            [
                'attribute' => 'password',
                'label' => 'Mật Khẩu',
                'type' => 'password',
                'autocomplete' => 'new-password',
            ],
            [
                'attribute' => 'phone_number',
                'label' => 'Số Điện Thoại',
                'type' => 'text',
                'autocomplete' => 'new-password',
                'format_phone' => true,
            ],
            [
                'attribute' => 'city',
                'label' => 'Tỉnh, Thành Phố',
                'type' => 'select',
            ],
            [
                'attribute' => 'district',
                'label' => 'Quận, Huyện',
                'type' => 'select',
            ],
            [
                'attribute' => 'ward',
                'label' => 'Phường, Xã',
                'type' => 'select',
            ],
            [
                'attribute' => 'apartment_number',
                'label' => 'Số Nhà',
                'type' => 'text',
            ],
        ];

        //Rules form
        $rules = [
            'email' => [
                'required' => true,
                'email' => true,
            ],
            'password' => [
                'required' => true,
                'minlength' => 8,
                'maxlength' => 24,
                'checklower' => true,
                'checkupper' => true,
                'checkdigit' => true,
                'checkspecialcharacter' => true,
            ],
            'name' => [
                'required' => true,
                'minlength' => 1,
                'maxlength' => 30,
            ],
            'apartment_number' => [
                'required' => true,
            ],
            'city' => [
                'required' => true,
            ],
            'district' => [
                'required' => true,
            ],
            'ward' => [
                'required' => true,
            ],
            'phone_number' => [
                'required' => true,
                'minlength' => 12,
                'maxlength' => 12,
            ],
        ];

        // Messages eror rules
        $messages = [
            'name' => [
                'required' => __('message.required', ['attribute' => 'Họ và tên']),
                'minlength' => __('message.min', ['min' => 1, 'attribute' => 'Họ và tên']),
                'maxlength' => __('message.max', ['max' => 30, 'attribute' => 'Họ và tên']),
            ],
            'email' => [
                'required' => __('message.required', ['attribute' => 'email']),
                'email' => __('message.email'),
            ],
            'password' => [
                'required' => __('message.required', ['attribute' => 'mật khẩu']),
                'minlength' => __('message.min', ['attribute' => 'Mật khẩu', 'min' => 8]),
                'maxlength' => __('message.max', ['attribute' => 'Mật khẩu', 'max' => 24]),
                'checklower' => __('message.password.at_least_one_lowercase_letter_is_required'),
                'checkupper' => __('message.password.at_least_one_uppercase_letter_is_required'),
                'checkdigit' => __('message.password.at_least_one_digit_is_required'),
                'checkspecialcharacter' => __('message.password.at_least_special_characte_is_required'),
            ],
            'phone_number' => [
                'required' => __('message.required', ['attribute' => 'số điện thoại']),
                'minlength' => __('message.min', ['attribute' => 'số điện thoại', 'min' => 10]),
                'maxlength' => __('message.max', ['attribute' => 'số điện thoại', 'max' => 10]),
            ],
            'city' => [
                'required' =>  __('message.required', ['attribute' => 'tỉnh, thành phố']),
            ],
            'district' =>[
                'required' =>  __('message.required', ['attribute' => 'quận, huyện']),
            ],
            'ward' => [
                'required' => __('message.required', ['attribute' => 'phường, xã']),
            ],
            'apartment_number' => [
                'required' =>  __('message.required', ['attribute' => 'số nhà']),
            ],
        ];

        return [
            'title' => TextLayoutTitle("create_user"),
            'fields' => $fields,
            'rules' => $rules,
            'messages' => $messages,
        ];
    }

    /** 
     * store the user in the database.
     * @param App\Http\Requests\Admin\StoreUserRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $data = $request->validated();
            // user data request
            $userData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'phone_number' => $data['phone_number'],
                'role_id' => Role::ROLE['user'],
                'created_by' => Auth::guard('admin')->user()->id,
            ];
            
            // address data request
            $addressData = [
                'city' => $data['city'],
                'district' => $data['district'],
                'ward' => $data['ward'],
                'apartment_number' => $data['apartment_number'],
            ];
            
            $token = Str::random(64);
            $time = Config::get('auth.verification.expire.resend', 60);
            DB::beginTransaction();
            $user = $this->userRepository->create($userData);
            UserVerify::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'token' => $token,
                    'expires_at' => Carbon::now()->addMinutes($time),
                ]
            );
            $user->notify(new VerifyUser($token));
            $addressData['user_id'] = $user->id;
            $this->addressRepository->updateOrCreate($addressData);
            DB::commit();
            return redirect()->route('admin.users_index');
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return redirect()->route('admin.users_index')->with('error', $e->getMessage());
        }
    }
}
?>