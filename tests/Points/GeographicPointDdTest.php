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
        $latitude = new LatitudeDd(-44);
        $longitude = new LongitudeDd(45);

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

    public function testDistanceDifferentFromZero(): void
    {
        $latitude = new LatitudeDd(\mt_rand(0, 90));
        $longitude = new LongitudeDd(\mt_rand(-180, 180));
        $latitudeSecond = new LatitudeDd(\mt_rand(-90, -1));

        $firstGeographicPointDd = new GeographicPointDd($latitude, $longitude);
        $secondGeographicPointDd = new GeographicPointDd($latitudeSecond, $longitude);

        $this->assertNotEquals(0, $firstGeographicPointDd->calculateDistanceInMeters($secondGeographicPointDd));
        $this->assertNotEquals(0, $secondGeographicPointDd->calculateDistanceInMeters($firstGeographicPointDd));
        $this->assertNotEquals(0, $firstGeographicPointDd->calculateDistanceInKilometers($secondGeographicPointDd));
        $this->assertNotEquals(0, $secondGeographicPointDd->calculateDistanceInKilometers($firstGeographicPointDd));
    }

    public function testCompareDistanceWithNationalHurricaneCenter(): void
    {
        // https://www.nhc.noaa.gov/gccalc.shtml
        $latitude = new LatitudeDd(3);
        $longitude = new LongitudeDd(-3);

        $latitudeSecond = new LatitudeDd(-4);
        $longitudeSecond = new LongitudeDd(4);

        $firstGeographicPointDd = new GeographicPointDd($latitude, $longitude);
        $secondGeographicPointDd = new GeographicPointDd($latitudeSecond, $longitudeSecond);

        $this->assertEquals(1100, (int)$firstGeographicPointDd->calculateDistanceInKilometers($secondGeographicPointDd));
    }

    public function testDistanceWarsawSiedlce(): void
    {
        $latitude = new LatitudeDd(52.22917);
        $longitude = new LongitudeDd(21.01148);

        $latitudeSecond = new LatitudeDd(52.16857);
        $longitudeSecond = new LongitudeDd(22.29688);

        $firstGeographicPointDd = new GeographicPointDd($latitude, $longitude);
        $secondGeographicPointDd = new GeographicPointDd($latitudeSecond, $longitudeSecond);

        $this->assertEquals(87, (int)$firstGeographicPointDd->calculateDistanceInKilometers($secondGeographicPointDd));
    }
}
