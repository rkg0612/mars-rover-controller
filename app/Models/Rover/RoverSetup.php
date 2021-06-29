<?php

namespace App\Models\Rover;

use App\Models\Coordinate\Coordinate;
use App\Models\Direction\Direction;

class RoverSetup
{
    private $coordinate;

    private $direction;

    public function __construct($setupString)
    {
        $setup = explode(" ", $setupString);
        $this->coordinate = new Coordinate($setup[0], $setup[1]);
        $this->direction = new Direction($setup[2]);
    }

    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    public function getDirection(): Direction
    {
        return $this->direction;
    }

    public function toString(): string
    {
        return $this->coordinate->getX() . " " . $this->coordinate->getY() . " " . $this->direction->getOrientation();
    }
}
