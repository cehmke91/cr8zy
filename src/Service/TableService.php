<?php

namespace App\Service;

use App\Model\Card;
use App\Model\Deck;
use App\Model\Player;

class TableService
{
    protected const DEAL_NUM = 7;

    private Deck $deck;
    private Deck $discard;

    public function __construct(Deck $deck)
    {
        $this->deck = $deck;
        $this->discard = new Deck([]);
    }

    /** @param Player[] $players */
    public function setupGame(array &$players): void
    {
        $this->deck->shuffle();

        foreach ($players as &$player) {
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

    public function draw(): Card
    {
        return $this->deck->draw();
    }

    public function discard(Card $card): void
    {
        $this->discard->stackCard($card);
    }
}
