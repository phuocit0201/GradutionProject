<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface BaseRepositoryInterface
 * @package App\Repositories
 */
interface BaseRepositoryInterface
{
    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model;

   /**
    * @param $id
    * @return int
    */
    public function destroy($id): int;

    /**
    * @param array $attributes
    * @return Model
    */
    public function update(Model $model, array $attributes): bool;

}
?>