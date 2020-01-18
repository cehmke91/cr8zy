<?php

namespace App\Service;

use App\Model\Card;
use App\Model\Deck;
use App\Model\Player;

class TableService
{
    protected const DEAL_NUM = 7;

    /** @var Player[] */
    private array $players;

    private Deck $deck;
    private Deck $discard;

    /**
     * TableService constructor.
     *
     * @param Player[] $players
     * @param Deck $deck
     */
    public function __construct(array $players, Deck $deck)
    {
        $this->players = $players;
        $this->deck = $deck;
        $this->discard = new Deck([]);
    }

    public function setupGame(): void
    {
        $this->deck->shuffle();

        foreach ($this->players as &$player) {
            $hand = [];
            for ($i = 0; $i < self::DEAL_NUM; $i++) {
                $hand[] = $this->deck->draw();
            }

            $player->setHand($hand);
        }

        $this->discard->stackCard($this->deck->draw());
    }

    public function currentCard(): Card
    {
        return $this->discard->peek();
    }

    public function discard(Card $card): void
    {
        $this->discard->stackCard($card);
    }
}
