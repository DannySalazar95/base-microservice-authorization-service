<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentType\DocumentTypeDestroyRequest;
use App\Http\Requests\DocumentType\DocumentTypeStoreRequest;
use App\Http\Requests\DocumentType\DocumentTypeUpdateRequest;
use App\Http\Resources\DocumentType\DocumentTypeIndexResource;
use App\Http\Resources\DocumentType\DocumentTypeShowResource;
use App\Http\Resources\DocumentType\DocumentTypeStoreResource;
use App\Http\Resources\DocumentType\DocumentTypeUpdateResource;
use App\Repositories\DocumentType\DocumentTypeRepositoryInterface;
use App\Services\DocumentTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DocumentTypeController extends Controller
{
    /**
     * @var DocumentTypeRepositoryInterface
     */
    protected $documentTypeServ;

    /**
     * DocumentTypeController constructor.
     * @param DocumentTypeService $documentTypeService
     */
    public function __construct(DocumentTypeService $documentTypeService)
    {
        $this->documentTypeServ = $documentTypeService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    protected function index(): AnonymousResourceCollection
    {
        $data = $this->documentTypeServ->indexWithPaginate();
        return DocumentTypeIndexResource::collection($data);
    }

    /**
     * @param $document_type_id
     * @return DocumentTypeShowResource
     */
    protected function show($document_type_id): DocumentTypeShowResource
    {
        $d = $this->documentTypeServ->find($document_type_id, 'name');

        return new DocumentTypeShowResource($d);
    }

    /**
     * @param DocumentTypeStoreRequest $request
     * @return DocumentTypeStoreResource
     */
    protected function store(DocumentTypeStoreRequest $request): DocumentTypeStoreResource
    {
        $body = $request->validated();
        $d = $this->documentTypeServ->store($body);

        return new DocumentTypeStoreResource($d);
    }

    /**
     * @param DocumentTypeUpdateRequest $request
     * @param $document_type_id
     * @return DocumentTypeUpdateResource
     */
    protected function update(DocumentTypeUpdateRequest $request, $document_type_id): DocumentTypeUpdateResource
    {
        $body = $request->validated();
        $this->documentTypeServ->update($body, $document_type_id, 'name');
        $d = $this->documentTypeServ->find($document_type_id, 'name');

        return new DocumentTypeUpdateResource($d);
    }

    /**
     * @param DocumentTypeDestroyRequest $request
     * @param null $document_type_id
     * @return JsonResponse
     */
    protected function destroy(DocumentTypeDestroyRequest $request, $document_type_id = null): JsonResponse
    {
        $body = $request->validated();
        $ids = is_null($document_type_id) ? $body['ids'] : [$document_type_id];
        $this->documentTypeServ->destroy($ids,'name');

        return response()->json(['message' => 'DOCUMENT_TYPE_DESTROY']);
    }
}
