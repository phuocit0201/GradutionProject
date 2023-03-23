<?php

namespace App\Repository\Eloquent;

use App\Models\Category;

/**
 * Class UserRepository
 * @package App\Repositories\Eloquent
 */
class CategoryRepository extends BaseRepository
{
    /**
     * CategoryRepository constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
}

?>