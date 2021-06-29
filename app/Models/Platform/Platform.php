<?php

namespace App\Models\Platform;

use App\Models\Coordinate\Coordinate;

class Platform
{
    private $minBorders;

    private $maxBorders;

    public function getMinBorders(): Coordinate
    {
        return $this->minBorders;
    }

    public function getMaxBorders(): Coordinate
    {
        return $this->maxBorders;
    }

    public function __construct(Coordinate $maxCoordinate)
    {
        $this->minBorders = new Coordinate(0, 0);
        $this->maxBorders = $maxCoordinate;
    }
}
