<?php

namespace App\Services;

use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use Exception;
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
     * Create user when login with google
     * @param oject $infoGoogle
     * @param string $provider
     * 
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function createUserByGoogle($infoGoogle, $provider)
    {
        $user = User::where('provider_id', $infoGoogle->id)->first();
        
        if (! $user) {
            $user = User::create([
                'name'     => $infoGoogle->name,
                'email'    => $infoGoogle->email,
                'provider' => $provider,
                'provider_id' => $infoGoogle->id
            ]);
        }
        return $user;
    }

    /**
     * Get all of the users from the database
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all(): ?Collection
    {
        return $this->userRepository->all();
    }

    /**
     * Find the models for the given IDs
     * @param $id
     *
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->userRepository->find($id);
    }

}
?>