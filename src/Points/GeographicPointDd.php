<?php

declare(strict_types=1);

namespace App\Points;


class GeographicPointDd
{
    private $latitude;
    private $longitude;

    public function __construct(
        float $latitude,
        float $longitude
    )
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function calculateDistanceInKilometers(self $strangerPoint): float
    {
        $theta = $this->longitude - $strangerPoint->longitude;
        $distance = \sin(\deg2rad($this->latitude)) * \sin(\deg2rad($strangerPoint->latitude)) +
            \cos(\deg2rad($this->latitude)) * \cos(\deg2rad($strangerPoint->latitude)) * \cos(\deg2rad($theta));
        $distance = \acos($distance);
        $distance = rad2deg($distance);
        $kilometers = $distance * 60 * 1.1515 * 1.609344;

        return $kilometers;
    }

    public function calculateDistanceInMeters(self $strangerPoint): float
    {
        return $this->calculateDistanceInKilometers($strangerPoint) * 1000;
    }

}