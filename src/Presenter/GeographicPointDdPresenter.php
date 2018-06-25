<?php

declare(strict_types=1);

namespace App\Presenter;

use Symfony\Component\Validator\Constraints as Assert;
use App\Points\Validators as AssertPoints;

class GeographicPointDdPresenter
{
    /**
     * @Assert\NotBlank()
     * @AssertPoints\LatitudeDd()
     */
    private $latitude = 0;

    /**
     * @Assert\NotBlank()
     * @AssertPoints\LongitudeDd()
     */
    private $longitude = 0;

    /**
     * @return int|float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param int|float $latitude
     */
    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return int|float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param int|float $longitude
     */
    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }
}
