<?php

namespace App\Models\Command;

use App\Models\Command\Rotatable;
use App\Models\Direction\Direction;
use App\Models\Rover\Rover;
use App\Models\Rover\RoverSetup;

class TurnLeft extends Rotatable implements Command
{
    public function execute(Rover $rover): void
    {
        $currentSetup = $rover->getSetup();
        $currentXPosition = $currentSetup->getCoordinate()->getX();
        $currentYPosition = $currentSetup->getCoordinate()->getY();
        $currentOrientation = $currentSetup->getDirection()->getOrientation();

        $newInputSetup = $currentXPosition . " " . $currentYPosition . " " . $this->rotateFrom($currentOrientation);
        $rover->setSetup(new RoverSetup($newInputSetup));

        return;
    }

    protected function rotateFrom($currentDirection): string
    {
        switch ($currentDirection) {
            case Direction::NORTH:
                return Direction::WEST;
            case Direction::WEST:
                return Direction::SOUTH;
            case Direction::SOUTH:
                return Direction::EAST;
            case Direction::EAST:
                return Direction::NORTH;
        }
    }
}
