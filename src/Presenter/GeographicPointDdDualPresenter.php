<?php

declare(strict_types=1);

namespace App\Presenter;

use Symfony\Component\Validator\Constraints as Assert;

class GeographicPointDdDualPresenter
{
    /**
     * @Assert\NotBlank()
     */
    private $latitude1;

    /**
     * @Assert\NotBlank()
     */
    private $longitude1;

    /**
     * @Assert\NotBlank()
     */
    private $latitude2;

    /**
     * @Assert\NotBlank()
     */
    private $longitude2;

    /**
     * @return mixed
     */
    public function getLatitude1()
    {
        return $this->latitude1;
    }

    /**
     * @param mixed $latitude1
     */
    public function setLatitude1($latitude1): void
    {
        $this->latitude1 = $latitude1;
    }

    /**
     * @return mixed
     */
    public function getLongitude1()
    {
        return $this->longitude1;
    }

    /**
     * @param mixed $longitude1
     */
    public function setLongitude1($longitude1): void
    {
        $this->longitude1 = $longitude1;
    }

    /**
     * @return mixed
     */
    public function getLatitude2()
    {
        return $this->latitude2;
    }

    /**
     * @param mixed $latitude2
     */
    public function setLatitude2($latitude2): void
    {
        $this->latitude2 = $latitude2;
    }

    /**
     * @return mixed
     */
    public function getLongitude2()
    {
        return $this->longitude2;
    }

    /**
     * @param mixed $longitude2
     */
    public function setLongitude2($longitude2): void
    {
        $this->longitude2 = $longitude2;
    }

}
