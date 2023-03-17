<?php

namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Repository\AdminRepositoryInterface;

/**
 * Class UserRepository
 * @package App\Repositories\Eloquent
 */
class CategoryRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
}

?>