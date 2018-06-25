<?php

declare(strict_types=1);

namespace App\Tests\Points\ValueObject;

use App\Points\ValueObject\LongitudeDd;
use PHPUnit\Framework\TestCase;

class LongitudeDdTest extends TestCase
{
    public function testCorrectValues(): void
    {
        $value = \mt_rand(-180, 180);
        $latitudeDd = new LongitudeDd($value);

        $this->assertInstanceOf(LongitudeDd::class, $latitudeDd);
    }

    public function testIncorrectSmallerValues(): void
    {
        $valueSmaller = \mt_rand(-9070, -181);

        $this->expectException(\InvalidArgumentException::class);
        new LongitudeDd($valueSmaller);
    }

    public function testIncorrectBiggerValues(): void
    {
        $valueBigger = \mt_rand(181, 98741);

        $this->expectException(\InvalidArgumentException::class);
        new LongitudeDd($valueBigger);
    }
}
