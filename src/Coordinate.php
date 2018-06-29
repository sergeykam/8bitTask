<?php
declare(strict_types = 1);

namespace src;


class Coordinate
{
    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Lat: {$this->latitude}, Long: {$this->longitude}";
    }
}