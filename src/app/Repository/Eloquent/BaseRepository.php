<?php

namespace App\Repository\Eloquent;

use App\Repository\BaseRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Repositories\Eloquent
 */
class BaseRepository implements BaseRepositoryInterface 
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /** 
     * create the model in the database.
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        try {
            return $this->model->create($attributes);
        } catch (Exception) {
            return null;
        }
    }

    /** 
     * Update the model in the database.
     * @param array $attributes
     *
     * @return bool
     */
    public function update(Model $model, array $attributes): bool
    {
        try {
            return $model->update($attributes);
        } catch (Exception) {
            return false;
        }
    }

    /**
     * Find the models for the given IDs
     * @param $id
     *
     * @return Model
     */
    public function find($id): ?Model
    {
        try {
            return $this->model->find($id);
        } catch (Exception) {
            return null;
        }
    }

    /**
     * Destroy the models for the given IDs.
     * @param $ids
     * @return int
     */
    public function destroy($ids): int 
    {
        try {
            return $this->model->destroy($ids);
        } catch (Exception) {
            return false;
        }
    }
}
?>