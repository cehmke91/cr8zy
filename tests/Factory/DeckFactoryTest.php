<?php

use App\Factory\DeckFactory;
use App\Model\Deck;
use PHPUnit\Framework\TestCase;

class DeckFactoryTest extends TestCase
{
    /** @test @group DeckFactory */
    public function itCanBuildADeck(): void
    {
        $deckFactory = new DeckFactory();
        /** @var Deck $deck */
        $deck = $deckFactory->buildPokerDeck();

        $this->assertEquals(true, $deck instanceof Deck);
        $this->assertEquals(52, $deck->cardsLeft());
    }
}
