<?php


namespace App\Services;


use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userDB;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userDB = $userRepository;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return $this->userDB->indexWithPaginate();
    }

    /**
     * @param array $values
     * @return Model
     */
    public function store(array $values): Model
    {
        $values['password'] = Hash::make($values['password']);
        return $this->userDB->store($values);
    }

    /**
     * @param $field_id
     * @param string $field_name
     * @return Model
     */
    public function find($field_id, string $field_name = 'id'): Model
    {
        return $this->userDB->find($field_id, $field_name);
    }

    /**
     * @param array $values
     * @param $field_id
     * @param string $field_name
     * @return Model
     */
    public function update(array $values, $field_id, $field_name = 'id'): Model
    {
        $this->userDB->update($values, $field_id, $field_name);
        return $this->userDB->find($field_id, $field_name);
    }

    /**
     * @param array $field_ids
     * @param string $field_name
     */
    public function destroy(array $field_ids, $field_name = 'id'): void
    {
        $this->userDB->destroy($field_ids, $field_name);
    }
}