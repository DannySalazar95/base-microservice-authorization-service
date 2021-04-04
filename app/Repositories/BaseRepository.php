<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseRepository implements EloquentRepositoryInterface
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

    public abstract function modelName();

    /**
     * @param array $values
     * @return Model
     */
    public function store(array $values): Model
    {
        return $this->model->create($values);
    }

    /**
     * @param $field_id
     * @param string $field_name
     * @return Model|null
     */
    public function find(
        $field_id,
        string $field_name = 'id'
    ): ?Model
    {
        $user = $this->model->where($field_name, $field_id)->first();
        if (empty($user))
            throw new ModelNotFoundException(
                $this->modelName().' no encontrado.'
            );
        return $user;
    }

    /**
     * @param array $values
     * @param $field_id
     * @param string $field_name
     * @return int
     */
    public function update(array $values, $field_id, string $field_name = 'id'): int
    {
        return $this->model->where($field_name, $field_id)->update($values);
    }

    /**
     * @param array $field_ids
     * @param string $field_name
     */
    public function destroy(array $field_ids, string $field_name = 'id'): void
    {
        $this->model->whereIn($field_name, $field_ids)->delete();
    }
}