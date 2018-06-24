<?php

declare(strict_types=1);

namespace App\Presenter;

use Symfony\Component\Validator\Constraints as Assert;

class GeographicPointDdPresenter
{
    /**
     * @Assert\NotBlank()
     */
    private $latitude;

    /**
     * @Assert\NotBlank()
     */
    private $longitude;

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude): void
    {
        $this->longitude = $longitude;
    }
}
