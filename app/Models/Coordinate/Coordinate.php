<?php

namespace App\Models\Coordinate;

class Coordinate
{
    private $x;

    private $y;

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function __construct($x, $y)
    {
        $this->x = (int)$x;
        $this->y = (int)$y;
    }
}