<?php


namespace App\Services;


use App\Models\DocumentType;
use App\Repositories\DocumentType\DocumentTypeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class DocumentTypeService
{
    /**
     * @var DocumentTypeRepositoryInterface
     */
    protected $documentTypeDB;

    /**
     * DocumentTypeService constructor.
     * @param DocumentTypeRepositoryInterface $documentTypeRepository
     */
    public function __construct(DocumentTypeRepositoryInterface $documentTypeRepository)
    {
        $this->documentTypeDB = $documentTypeRepository;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function indexWithPaginate(): LengthAwarePaginator
    {
        return $this->documentTypeDB->indexWithPaginate();
    }

    /**
     * @param array $values
     * @return Model
     */
    public function store(array $values): Model
    {
        return $this->documentTypeDB->store($values);
    }

    /**
     * @param $field_id
     * @param string $field_name
     * @return Model
     */
    public function find($field_id, string $field_name = 'id'): Model
    {
        return $this->documentTypeDB->find($field_id, $field_name);
    }

    /**
     * @param array $values
     * @param $field_id
     * @param string $field_name
     * @return Model
     */
    public function update(array $values, $field_id, $field_name = 'id'): Model
    {
        $this->documentTypeDB->update($values, $field_id, $field_name);
        return $this->documentTypeDB->find($field_id, $field_name);
    }

    /**
     * @param array $field_ids
     * @param string $field_name
     */
    public function destroy(array $field_ids, $field_name = 'id'): void
    {
        $this->documentTypeDB->destroy($field_ids, $field_name);
    }
}