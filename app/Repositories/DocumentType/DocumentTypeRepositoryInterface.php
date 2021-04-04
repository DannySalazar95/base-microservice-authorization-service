<?php


namespace App\Repositories\DocumentType;


use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

interface DocumentTypeRepositoryInterface extends EloquentRepositoryInterface
{
    public function indexWithPaginate(): LengthAwarePaginator;
}