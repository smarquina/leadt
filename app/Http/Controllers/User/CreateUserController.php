<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\Shared\Uuid;
use App\Services\user\CreateUserDTO;
use App\Services\user\CreateUserService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as SFResponse;

final class CreateUserController extends Controller
{
    public function __invoke(CreateUserRequest $request, CreateUserService $service): JsonResponse
    {
        try {
            $userData = new CreateUserDTO(
                uuid: Uuid::generate(),
                email: $request->validated('email'),
                name: $request->validated('name')
            );

            $service->__invoke($userData);

            return $this->responseSuccessful(
                'User created',
                $userData->getUuid()
            );
        } catch (\Exception) {
            return $this->responseWithError(SFResponse::HTTP_INTERNAL_SERVER_ERROR, 'Fatal error');
        }
    }
}
