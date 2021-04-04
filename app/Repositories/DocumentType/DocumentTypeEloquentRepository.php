<?php


namespace App\Repositories\DocumentType;


use App\Models\DocumentType;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class DocumentTypeEloquentRepository extends BaseRepository implements DocumentTypeRepositoryInterface
{
    /**
     * DocumentTypeEloquentRepository constructor.
     * @param DocumentType $model
     */
    public function __construct(DocumentType $model)
    {
        parent::__construct($model);
    }

    /**
     * @return string
     */
    public function modelName(): string
    {
        return 'Tipo de documento';
    }

    /**
     * @return LengthAwarePaginator
     */
    public function indexWithPaginate(): LengthAwarePaginator
    {
        return $this->model->orderBy('name')->paginate(config('pagination.per_page'));
    }
}