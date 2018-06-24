<?php

declare(strict_types=1);

namespace App\Points\ValueObject;

class LatitudeDd
{
    private $value;

    public function __construct(float $value)
    {
        if ($value < 0 || $value > 90) {
            throw new \InvalidArgumentException();
        }
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
