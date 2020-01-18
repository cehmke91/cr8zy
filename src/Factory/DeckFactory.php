<?php

namespace App\Factory;

use App\Model\Card;
use App\Model\Deck;
use App\Enum\CardProperties;

class DeckFactory
{
    public function buildDeck(): Deck
    {
        $deck = new Deck();

        foreach (CardProperties::SUITES as $suite) {
            foreach (CardProperties::VALUES as $value) {
                $card = new Card($suite, $value);
                $deck->addCard($card);
            }
        }

        return $deck;
    }
}
