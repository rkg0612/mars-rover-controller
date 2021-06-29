<?php

namespace App\Models\Command;

use App\Models\Rover\Rover;

interface Command
{
    public function execute(Rover $Rover): void;
}
