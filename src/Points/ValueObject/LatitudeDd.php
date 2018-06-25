<?php

declare(strict_types=1);

namespace App\Points\ValueObject;

final class LatitudeDd
{
    /**
     * positive values - North
     * negative values - South
     * @var float
     */
    private $value;

    public function __construct(float $value)
    {
        if ($value < -90 || $value > 90) {
            throw new \InvalidArgumentException();
        }
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
