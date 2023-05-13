<?php

namespace App\Services\user;

use App\Events\UserCreatedEvent;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

final readonly class CreateUserService
{
    public function __construct(private UserRepositoryInterface $userRepository) { }

    public function __invoke(CreateUserDTO $userData): void
    {
        try {
            DB::beginTransaction();

            $user = (new User())
                ->setId($userData->getUuid())
                ->setName($userData->getName())
                ->setEmail($userData->getEmail());
            $this->userRepository->save($user);

            UserCreatedEvent::dispatch($user);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());

            throw $exception;
        }
    }
}
