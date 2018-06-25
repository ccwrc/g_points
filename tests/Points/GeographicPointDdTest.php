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

    public function testDistanceZero(): void
    {
        $latitude = new LatitudeDd(\mt_rand(10, 80));
        $longitude = new LongitudeDd(\mt_rand(5, 170));

        $firstGeographicPointDd = new GeographicPointDd($latitude, $longitude);
        $secondGeographicPointDd = new GeographicPointDd($latitude, $longitude);

        $this->assertEquals(0, $firstGeographicPointDd->calculateDistanceInMeters($secondGeographicPointDd));
        $this->assertEquals(0, $secondGeographicPointDd->calculateDistanceInMeters($firstGeographicPointDd));
        $this->assertEquals(0, $firstGeographicPointDd->calculateDistanceInKilometers($secondGeographicPointDd));
        $this->assertEquals(0, $secondGeographicPointDd->calculateDistanceInKilometers($firstGeographicPointDd));
    }
}
