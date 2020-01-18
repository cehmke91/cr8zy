<?php

use App\Factory\PlayerFactory;
use App\Model\Player;
use PHPUnit\Framework\TestCase;

class PlayerFactoryTest extends TestCase
{
    /** @test @group PlayerFactory */
    public function itCanCreatePlayers(): void
    {
        $playerFactory = new PlayerFactory();
        /** @var Player[] $players */
        $players = $playerFactory->createPlayers(['Tim', 'Jim']);

        $this->assertEquals(true, $players[0] instanceof Player);
        $this->assertEquals('Jim', $players[1]->getName());
    }
}
