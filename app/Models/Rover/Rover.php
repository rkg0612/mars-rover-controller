<?php

namespace App\Models\Rover;

use App\Models\Command\CommandsCollection;

class Rover
{
    private $setup;

    private $commands;

    public function getSetup(): RoverSetup
    {
        return $this->setup;
    }

    public function setCommands(CommandsCollection $commands): void
    {
        $this->commands = $commands;
        return;
    }

    public function setSetup(RoverSetup $roverSetup): void
    {
        $this->setup = $roverSetup;
        return;
    }

    public function execute(): void
    {
        $iterator = $this->commands->getIterator();
        $iterator->rewind();
        while ($iterator->valid()) {
            $command = $iterator->current();
            $command->execute($this);
            $iterator->next();
        }

        return;
    }

    public function getSetupAsString(): string
    {
        return $this->setup->toString();
    }
}
