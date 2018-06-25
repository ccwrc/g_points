<?php

declare(strict_types=1);

namespace App\Tests\Points;

use App\Points\GeographicPointDd;
use App\Points\ValueObject\{
    LatitudeDd, LongitudeDd
};
use PHPUnit\Framework\TestCase;

class GeographicPointDdTest extends TestCase
{
    public function testCreate(): void
    {
        $latitude = $this->createMock(LatitudeDd::class);
        $longitude = $this->createMock(LongitudeDd::class);

        $geographicPointDd = new GeographicPointDd($latitude, $longitude);
        $this->assertInstanceOf(GeographicPointDd::class, $geographicPointDd);
    }
}
