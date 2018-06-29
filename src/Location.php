<?php
declare(strict_types = 1);

namespace src;

class Location
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Coordinate
     */
    private $coordinate;

    /**
     * @param string $name
     * @param Coordinate $coordinate
     */
    public function __construct(string $name, Coordinate $coordinate)
    {
        $this->name = $name;
        $this->coordinate = $coordinate;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return implode(', ', [$this->name, (string)$this->coordinate]);
    }
}