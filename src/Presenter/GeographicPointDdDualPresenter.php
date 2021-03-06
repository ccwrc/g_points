<?php

declare(strict_types=1);

namespace App\Presenter;

use Symfony\Component\Validator\Constraints as Assert;
use App\Points\Validators as AssertPoints;

class GeographicPointDdDualPresenter
{
    /**
     * @Assert\NotBlank()
     * @AssertPoints\LatitudeDd()
     */
    private $latitude1 = 0;

    /**
     * @Assert\NotBlank()
     * @AssertPoints\LongitudeDd()
     */
    private $longitude1 = 0;

    /**
     * @Assert\NotBlank()
     * @AssertPoints\LatitudeDd()
     */
    private $latitude2 = 0;

    /**
     * @Assert\NotBlank()
     * @AssertPoints\LongitudeDd()
     */
    private $longitude2 = 0;

    /**
     * @return int|float
     */
    public function getLatitude1(): float
    {
        return $this->latitude1;
    }

    /**
     * @param int|float $latitude1
     */
    public function setLatitude1(float $latitude1): void
    {
        $this->latitude1 = $latitude1;
    }

    /**
     * @return int|float
     */
    public function getLongitude1(): float
    {
        return $this->longitude1;
    }

    /**
     * @param int|float $longitude1
     */
    public function setLongitude1(float $longitude1): void
    {
        $this->longitude1 = $longitude1;
    }

    /**
     * @return int|float
     */
    public function getLatitude2(): float
    {
        return $this->latitude2;
    }

    /**
     * @param int|float $latitude2
     */
    public function setLatitude2(float $latitude2): void
    {
        $this->latitude2 = $latitude2;
    }

    /**
     * @return int|float
     */
    public function getLongitude2(): float
    {
        return $this->longitude2;
    }

    /**
     * @param int|float $longitude2
     */
    public function setLongitude2(float $longitude2): void
    {
        $this->longitude2 = $longitude2;
    }
}
