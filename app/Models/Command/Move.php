<?php

namespace App\Models\Command;

use App\Models\Direction\Direction;
use App\Models\Rover\Rover;
use App\Models\Rover\RoverSetup;

class Move implements Command
{
    public function execute(Rover $rover): void
    {
        $currentSetup = $rover->getSetup();
        $currentXPosition = $currentSetup->getCoordinate()->getX();
        $currentYPosition = $currentSetup->getCoordinate()->getY();
        $currentOrientation = $currentSetup->getDirection()->getOrientation();

        switch ($currentOrientation) {
            case Direction::NORTH:
                $newInputSetup = $currentXPosition . " " . ($currentYPosition + 1) . " " . $currentOrientation;
                $rover->setSetup(new RoverSetup($newInputSetup));
                break;
            case Direction::WEST:
                $newInputSetup = ($currentXPosition - 1) . " " . $currentYPosition . " " . $currentOrientation;
                $rover->setSetup(new RoverSetup($newInputSetup));
                break;
            case Direction::EAST:
                $newInputSetup = ($currentXPosition + 1) . " " . $currentYPosition . " " . $currentOrientation;
                $rover->setSetup(new RoverSetup($newInputSetup));
                break;
            case Direction::SOUTH:
                $newInputSetup = $currentXPosition . " " . ($currentYPosition - 1) . " " . $currentOrientation;
                $rover->setSetup(new RoverSetup($newInputSetup));
                break;
        }

        return;
    }
}
