# Mars Rover Controller

Features:
- Give initial starting point (x and y) of the rover and the initial facing direction of the rover (N, S, E, W)
- Rover takes the commands. (e.g FRLFLFLFR)
    - F = move forward
    - R = turn right
    - L = turn left
- Implemented on a 200x200 planet
- With obstacle detection

Setup:
- After cloning, make a `.env` file and run `php artisan key:generate`
- Run `php artisan serve` and access via [http://localhost:8000](http://localhost:8000)