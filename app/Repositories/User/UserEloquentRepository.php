<?php


namespace App\Repositories\User;


use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UserEloquentRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @return string
     */
    public function modelName(): string
    {
        return 'Usuario';
    }

    /**
     * @return LengthAwarePaginator
     */
    public function indexWithPaginate(): LengthAwarePaginator
    {
        return $this->model->orderBy('father_last_name')->paginate(config('pagination.per_page'));
    }
}