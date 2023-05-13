<?php

declare(strict_types=1);

namespace App\Services\user;

use App\Models\Shared\Uuid;

final readonly class CreateUserDTO
{
    public function __construct(private Uuid $uuid, private string $email, private string $name) { }

    /**
     * @return \App\Models\Shared\Uuid
     */
    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
