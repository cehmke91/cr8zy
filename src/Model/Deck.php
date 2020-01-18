<?php

namespace App\Model;

class Deck
{
    /** @var Card[] $cards */
    private array $cards;

    public function __construct(array $cards)
    {
        $this->cards = $cards;
    }

    public function stackCard(Card $card): void
    {
        array_unshift($this->cards, $card);
    }

    public function peek(): Card
    {
        return $this->cards[0];
    }

    public function draw(): Card
    {
        return array_shift($this->cards);
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    public function cardsLeft(): int
    {
        return count($this->cards);
    }
}
