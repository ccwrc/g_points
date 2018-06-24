<?php

declare(strict_types=1);

namespace App\Presenter;

use Symfony\Component\Validator\Constraints as Assert;

class GeographicPointDdDualPresenter
{
    /**
     * @Assert\NotBlank()
     * @Assert\Type("numeric")
     * @Assert\Range(
     * min = 0,
     * max = 90,
     * minMessage = "Minimum is {{ limit }}",
     * maxMessage = "Maximum is {{ limit }}"
     * )
     */
    private $latitude1 = 0;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("numeric")
     * @Assert\Range(
     * min = 0,
     * max = 180,
     * minMessage = "Minimum is {{ limit }}",
     * maxMessage = "Maximum is {{ limit }}"
     * )
     */
    private $longitude1 = 0;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("numeric")
     * @Assert\Range(
     * min = 0,
     * max = 90,
     * minMessage = "Minimum is {{ limit }}",
     * maxMessage = "Maximum is {{ limit }}"
     * )
     */
    private $latitude2 = 0;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("numeric")
     * @Assert\Range(
     * min = 0,
     * max = 180,
     * minMessage = "Minimum is {{ limit }}",
     * maxMessage = "Maximum is {{ limit }}"
     * )
     */
    private $longitude2 = 0;

    /**
     * @return int|float
     */
    public function getLatitude1()
    {
        return $this->latitude1;
    }

    /**
     * @param int|float $latitude1
     */
    public function setLatitude1($latitude1): void
    {
        $this->latitude1 = $latitude1;
    }

    /**
     * @return int|float
     */
    public function getLongitude1()
    {
        return $this->longitude1;
    }

    /**
     * @param int|float $longitude1
     */
    public function setLongitude1($longitude1): void
    {
        $this->longitude1 = $longitude1;
    }

    /**
     * @return int|float
     */
    public function getLatitude2()
    {
        return $this->latitude2;
    }

    /**
     * @param int|float $latitude2
     */
    public function setLatitude2($latitude2): void
    {
        $this->latitude2 = $latitude2;
    }

    /**
     * @return int|float
     */
    public function getLongitude2()
    {
        return $this->longitude2;
    }

    /**
     * @param int|float $longitude2
     */
    public function setLongitude2($longitude2): void
    {
        $this->longitude2 = $longitude2;
    }
}
