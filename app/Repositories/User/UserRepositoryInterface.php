<?php


namespace App\Repositories\User;



use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function indexWithPaginate(): LengthAwarePaginator;
}