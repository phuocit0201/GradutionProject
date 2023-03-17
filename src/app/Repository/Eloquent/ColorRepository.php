<?php

namespace App\Repository\Eloquent;

use App\Models\Color;

/**
 * Class UserRepository
 * @package App\Repositories\Eloquent
 */
class ColorRepository extends BaseRepository
{
    /**
     * ColorRepository constructor.
     *
     * @param Color $model
     */
    public function __construct(Color $category)
    {
        parent::__construct($category);
    }
}

?>