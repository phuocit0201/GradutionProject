<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserRepository
 * @package App\Repositories\Eloquent
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    /**
     * Get all of the users from the database
     * @return Collection
     */
    public function all(): ?Collection
    {
        try {
            return $this->model->orderBy('id', 'DESC')->get();
        } catch (Exception) {
            return null;
        }
    }
}

?>