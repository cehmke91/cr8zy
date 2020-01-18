<?php

namespace App\Service;

use App\Model\Card;
use App\Model\Player;

class IOService
{
    public function announce(string $announcement): void
    {
        echo('[' . date('H:i:s') . '] ' . $announcement . "\n");
    }

    /**
     * @param string $announcement
     * @param Card[] $hand
     */
    public function announceHand(string $announcement, array $hand): void
    {
        $cards = '';
        /** @var Card $card */
        foreach ($hand as $card) {
            $cards .= $card->display() . ' ';
        }

        $this->announce($announcement . $cards);
    }

    /**
     * @param string $announcement
     * @param Player[] $players
     */
    public function announcePlayers(string $announcement, array $players): void
    {
        $playerNames = '';
        /** @var Player $player */
        foreach ($players as $player) {
            $playerNames .= $player->getName() . ', ';
        }
        $playerNames = substr($playerNames, 0, -2);

        $this->announce($announcement . $playerNames);
    }
}
