<?php

namespace App\Factory;

use App\Model\Player;

class PlayerFactory
{
    /**
     * @param string[] $names
     * @return Player[]
     */
    public function createPlayers(array $names): array
    {
        $players = [];
        foreach ($names as $name) {
            $players[] = new Player($name);
        }

        return $players;
    }
}
