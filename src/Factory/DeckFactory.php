<?php

namespace App\Factory;

use App\Model\Card;
use App\Model\Deck;
use App\Enum\CardProperties;

class DeckFactory
{
    public function buildPokerDeck(): Deck
    {
        $cards = [];
        foreach (CardProperties::SUITES as $suite) {
            foreach (CardProperties::VALUES as $value) {
                $cards[] = new Card($suite, $value);
            }
        }

        return new Deck($cards);
    }
}
