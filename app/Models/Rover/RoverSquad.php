<?php

namespace App\Models\Rover;

class RoverSquad extends \ArrayObject
{
    public function execute(): void
    {
        $iterator = $this->getIterator();
        $iterator->rewind();

        while ($iterator->valid()) {
            $rover = $iterator->current();
            $rover->execute();
            $iterator->next();
        }

        return;
    }

    public function getRoversSetupAsString(): string
    {
        $iterator = $this->getIterator();
        $iterator->rewind();

        $setup = [];
        while ($iterator->valid()) {
            $rover = $iterator->current();
            $setup[] = $rover->getSetupAsString();
            $iterator->next();
        }

        return implode("\n", $setup);
    }
}
