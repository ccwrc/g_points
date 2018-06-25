<?php

declare(strict_types=1);

namespace App\Tests\Points\ValueObject;

use App\Points\ValueObject\LatitudeDd;
use PHPUnit\Framework\TestCase;

class LatitudeDdTest extends TestCase
{
    public function testCorrectValues(): void
    {
        $value = \mt_rand(-90, 90);
        $latitudeDd = new LatitudeDd($value);

        $this->assertInstanceOf(LatitudeDd::class, $latitudeDd);
    }

    public function testIncorrectSmallerValues(): void
    {
        $valueSmaller = \mt_rand(-900, -91);

        $this->expectException(\InvalidArgumentException::class);
        new LatitudeDd($valueSmaller);
    }

    public function testIncorrectBiggerValues(): void
    {
        $valueBigger = \mt_rand(91, 98741);

        $this->expectException(\InvalidArgumentException::class);
        new LatitudeDd($valueBigger);
    }
}
