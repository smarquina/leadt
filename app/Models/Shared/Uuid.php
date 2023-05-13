<?php

declare(strict_types=1);

namespace App\Models\Shared;

use Illuminate\Support\Str;

final readonly class Uuid
{
    /**
     * @throws \RuntimeException
     */
    public function __construct(private string $uuid)
    {
        $this->validateUuid($this->uuid);
    }

    public function getValue(): string
    {
        return $this->uuid;
    }


    public static function generate(): self
    {
        $class = static::class;
        return new $class(Str::uuid());
    }

    /**
     * @throws \RuntimeException
     */
    private function validateUuid($id): void
    {
        if (!Str::isUuid($id)) {
            throw new \RuntimeException("UUID {$this->uuid} not valid");
        }
    }
}
