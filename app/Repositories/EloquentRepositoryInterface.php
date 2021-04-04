<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    public function store(array $values): Model;

    public function find(
        $field_id,
        string $field_name = 'id'
    ): ?Model;

    public function update(
        array $values,
        $field_id,
        string $field_name = 'id'
    ): int;

    public function destroy(
        array $field_ids,
        string $field_name = 'id'
    ): void;
}