<?php

declare(strict_types=1);

namespace App\Shared\Domain\Trait;

trait ArrayTrait
{
    public function toArray(): array
    {
        return array_map(static fn($var) => ($var instanceof \BackedEnum) ? $var->value : $var, get_object_vars($this));
    }

    public static function fromArray(array $data): static
    {
        return new static(...$data);
    }
}
