<?php

namespace App\Service;

use App\Model\Card;

class RulesService
{
    public function canPlayCard(Card $mine, Card $check): bool
    {
        if ($check->getValue() === $mine->getValue()
            || $check->getSuite() === $mine->getSuite()
        ) {
            return true;
        }

        return false;
    }

    public function canDrawCard(int $cardsInDeck): bool
    {
        return 0 === $cardsInDeck ? false : true;
    }

    public function winningHand(array $hand): bool
    {
        return 0 === count($hand);
    }
}
