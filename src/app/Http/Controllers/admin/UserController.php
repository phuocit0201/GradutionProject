<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
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
    
    public function index()
    {
        return view('admin.user.index', $this->userService->index());
    }

    public function create()
    {
        return view('admin.user.create', $this->userService->create());
    }

    public function store(StoreUserRequest $request)
    {
        return $this->userService->store($request);
    }
}
