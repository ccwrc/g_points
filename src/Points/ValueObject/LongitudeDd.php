<?php

declare(strict_types=1);

namespace App\Points\ValueObject;

final class LongitudeDd
{
    /**
     * positive values - West
     * negative values - East
     * @var float
     */
    private $value;

    public function __construct(float $value)
    {
        if ($value < -180 || $value > 180) {
            throw new \InvalidArgumentException();
        }
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
