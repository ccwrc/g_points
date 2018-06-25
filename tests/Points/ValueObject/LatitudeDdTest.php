<?php

declare(strict_types=1);

namespace App\Tests\Points\ValueObject;

use App\Points\ValueObject\LatitudeDd;
use PHPUnit\Framework\TestCase;

class LatitudeDdTest extends TestCase
{
    public function testCorrectValues(): void
    {
        $value = \mt_rand(0,90);
        $latitudeDd = new LatitudeDd($value);

        $this->assertInstanceOf(LatitudeDd::class, $latitudeDd);
    }

}
