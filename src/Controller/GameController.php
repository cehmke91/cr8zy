<?php

namespace App\Controller;

use App\Model\Player;
use App\Service\IOService;
use App\Service\RulesService;
use App\Service\TableService;

class GameController
{
    /** @var Player[] */
    private array $players;

    private TableService $table;
    private RulesService $rules;
    private IOService $io;

    public function __construct(
        array $players,
        TableService $tableService,
        RulesService $rulesService,
        IOService $ioService
    ) {
        $this->players = $players;
        $this->table = $tableService;
        $this->rules = $rulesService;
        $this->io = $ioService;
    }

    public function start(): void
    {
        $this->table->setupGame($this->players);
        $this->io->announcePlayers('Starting game with ', $this->players);

        /** @var Player $player */
        foreach ($this->players as $player) {
            $this->io->announceHand($player->getName() . ' has been dealt ', $player->getHand());
        }




    }
}
