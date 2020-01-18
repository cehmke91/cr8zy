<?php

namespace App\Model;

use App\Model\Card;

class Deck
{
    /** @var Card[] $cards */
    private array $cards;

    public function __construct()
    {
        $this->cards = [];
    }

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function display()
    {
        foreach ($this->cards as $card) {
            echo($card->display());
        }
    }
}
