<?php

namespace App\Http\Controllers;

use App\Models\Coordinate\Coordinate;
use App\Models\Platform\Platform;
use App\Models\Rover\RoverSetup;
use App\Models\Rover\Rover;
use App\Services\CommandParser;
use Illuminate\Http\Request;

class RoverController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function giveCommands(Request $request)
    {
        $request->validate([
            'x' => 'required|numeric|max:200',
            'y' => 'required|numeric|max:200',
            'facing_direction' => 'required|string',
            'command_string' => 'required|string'
        ]);
        $data = $request->all();
        try {
            $x = $data['x'];
            $y = $data['y'];
            $facingDirection = $data['facing_direction'];
            $commandString = $data['command_string'];

            $coordinates = new Coordinate(200, 200);
            $planet = new Platform($coordinates);

            $inputNumber = 0;
            $squadCounter = 0;

            $rover = new Rover();
            $rover->setSetup(new RoverSetup("$x $y $facingDirection"));
            $rover->setCommands((new CommandParser($commandString))->getCommandsCollection());
            $rover->execute();
            $position_string = explode(" ", $rover->getSetupAsString());
            $position = (object)[
                'x' => $position_string[0], 
                'y' => $position_string[1],
                'direction' => $this->parseDirection($position_string[2])
            ];
            return view('current_rover_position', compact('position'));
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors(['msg' => $e->getMessage()])->withInput($request->input());
        }
    }

    private function parseDirection($direction)
    {
        switch($direction)
        {
            case 'N':
                $directionString = 'NORTH';
                break;
            case 'E':
                $directionString = 'EAST';
                break;
            case 'W':
                $directionString = 'WEST';
                break;
            case 'S':
                $directionString = 'SOUTH';
                break;
            default:
                $directionString = 'INVALID DIRECTION';
                break;
        }
        return $directionString;
    }
}
