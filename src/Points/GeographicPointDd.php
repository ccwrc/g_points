<?php

declare(strict_types=1);

namespace App\Points;

use App\Points\ValueObject\{
    LatitudeDd, LongitudeDd
};

class GeographicPointDd
{
    private $latitude;
    private $longitude;

    public function __construct(
        LatitudeDd $latitude,
        LongitudeDd $longitude
    )
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function calculateDistanceInKilometers(self $strangerPoint): float
    {
        if ($this->latitude->getValue() === $strangerPoint->latitude->getValue() &&
            $this->longitude->getValue() === $strangerPoint->longitude->getValue()) {
            return 0;
        }

        $theta = $this->longitude->getValue() - $strangerPoint->longitude->getValue();
        $distance = \sin(\deg2rad($this->latitude->getValue())) * \sin(\deg2rad($strangerPoint->latitude->getValue())) +
            \cos(\deg2rad($this->latitude->getValue())) * \cos(\deg2rad($strangerPoint->latitude->getValue())) *
            \cos(\deg2rad($theta));
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
