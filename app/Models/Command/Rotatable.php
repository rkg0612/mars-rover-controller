<?php

namespace App\Models\Command;

abstract class Rotatable
{
    abstract protected function rotateFrom($currentDirection): string;
}