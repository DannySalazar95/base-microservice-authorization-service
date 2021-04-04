<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserDestroyRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Resources\User\UserIndexResource;
use App\Http\Resources\User\UserShowResource;
use App\Http\Resources\User\UserStoreResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userServ;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userServ = $userService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    protected function index(): AnonymousResourceCollection
    {
        $data = $this->userServ->index();
        return UserIndexResource::collection($data);
    }

    /**
     * @param UserStoreRequest $request
     * @return UserStoreResource
     */
    protected function store(UserStoreRequest $request): UserStoreResource
    {
        $body = $request->validated();
        $user = $this->userServ->store($body);

        return new UserStoreResource($user);
    }

    /**
     * @param $user_id
     * @return UserShowResource
     */
    protected function show($user_id): UserShowResource
    {
        $user = $this->userServ->find($user_id);

        return new UserShowResource($user);
    }

    /**
     * @param UserDestroyRequest $request
     * @param null $user_id
     * @return JsonResponse
     */
    protected function destroy(UserDestroyRequest $request, $user_id = null): JsonResponse
    {
        $body = $request->validated();
        $ids = is_null($user_id) ? $body['ids'] : [$user_id];
        $this->userServ->destroy($ids);

        return response()->json(['message' => 'USER_DESTROY']);
    }
}
