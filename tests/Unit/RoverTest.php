<?php

namespace Tests\Unit;

use App\Http\Controllers\RoverController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Tests\TestCase;

class RoverTest extends TestCase
{
    /**
     * @test
     */
    public function rover_can_move()
    {
        $controller = new RoverController();
        $request = Request::create('/give-commands', 'POST', [
            'x' => 100,
            'y' => 100,
            'facing_direction' => 'N',
            'command_string' => 'FLFRFLLFRF'
        ]);
        $response = $controller->giveCommands($request);
        $this->assertInstanceOf(View::class, $response);
    }
}
