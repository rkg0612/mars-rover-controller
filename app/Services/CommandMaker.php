<?php

namespace App\Services;

use App\Models\Command\Command;
use App\Models\Command\CommandTypes;
use App\Models\Command\Move;
use App\Models\Command\TurnLeft;
use App\Models\Command\TurnRight;

class CommandMaker
{
	public function makeCommand(string $commandType)
	{
        switch ($commandType) {
            case CommandTypes::FORWARD:
                return new Move();
            case CommandTypes::RIGHT:
                return new TurnRight();
            case CommandTypes::LEFT:
                return new TurnLeft();
            default:
                throw new \Exception("Command string can only have the characters: F, L, or R.");
        }
	}
}