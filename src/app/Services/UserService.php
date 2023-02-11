<?php

namespace App\Services;

use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserService 
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all of the users from the database
     */
    public function all()
    {
        return $this->userRepository->all();
    }
}
?>