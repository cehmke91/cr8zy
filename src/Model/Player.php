<?php

namespace App\Model;

class Player
{
    private string $name;
    private array $hand;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->hand = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHand(): array
    {
        return $this->hand;
    }

    public function setHand(array $hand): void
    {
        $this->hand = $hand;
    }

    public function getCard(int $index): Card
    {
        $card = $this->hand[$index];
        array_splice($this->hand, $index, 1);

        return $card;
    }

    public function addCard(Card $card): void
    {
        $this->hand[] = $card;
    }
}
