<?php

namespace App\Controller;

use App\Model\Player;
use App\Service\BrainService;
use App\Service\IOService;
use App\Service\TableService;

class GameController
{
    const MAX_NUM_PLAYERS = 7;

    /** @var Player[] */
    private array $players;

    private TableService $table;
    private BrainService $brain;
    private IOService $io;

    public function __construct(
        array $players,
        TableService $tableService,
        BrainService $brainService,
        IOService $ioService
    ) {
        $this->players = $players;
        $this->table = $tableService;
        $this->brain = $brainService;
        $this->io = $ioService;
    }

    public function start(): void
    {
        $this->correctNumPlayers($this->players);

        $this->table->setupGame($this->players);
        $this->io->announcePlayers('Starting game with ', $this->players);

        /** @var Player $player */
        foreach ($this->players as $player) {
            $this->io->announceHand($player->getName() . ' has been dealt ', $player->getHand());
        }
        $this->io->announce('Top card is ' . $this->table->currentCard()->display());

        $win = false;
        while (false === $win) {
            /** @var Player $player */
            foreach ($this->players as &$player) {
                $cardIndex = $this->brain->findBestCard($player->getHand(), $this->table->currentCard());

                if (null !== $cardIndex) {
                    $card = $player->getCard($cardIndex);
                    $this->table->discard($card);

                    $this->io->announce($player->getName() . ' plays ' . $card->display());
                } else {
                    if ($this->brain->shouldDrawCard($this->table->cardsInDeck())) {
                        $card = $this->table->draw();
                        $player->addCard($card);

                        $this->io->announce($player->getName() . ' does not have a suitable card, taking from deck ' . $card->display());
                    } else {
                        $this->io->announce($player->getName() . ' does not have a suitable card, cant draw. Skip');
                    }
                }

                if($this->brain->doIWin($player->getHand())) {
                    $this->io->announce($player->getName() . ' has won.');
                    $win = true;
                    break;
                }
            }
        }
    }

    private function correctNumPlayers(array $players): void
    {
        if (self::MAX_NUM_PLAYERS <= count(players)) {
            $this->players = array_slice($this->players, 0, self::MAX_NUM_PLAYERS);
        }

        if (0 === $this->players) {
            throw new \Exception('Game needs players to start');
        }
    }
}
