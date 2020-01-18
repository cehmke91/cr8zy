<?php

use App\Model\Card;
use App\Model\Deck;
use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test @group Deck */
    public function itCanPeek(): void
    {
        $card = Mockery::mock(Card::class);
        $deck = new Deck([$card]);

        $this->assertEquals($card, $deck->peek());
    }

    /** @test @group Deck */
    public function itCanPeekEmpty(): void
    {
        $deck = new Deck([]);
        $this->assertEquals(null, $deck->peek());
    }

    /** @test @group Deck */
    public function itCanStackCard(): void
    {
        $deck = new Deck([]);
        $card = Mockery::mock(Card::class);

        $deck->stackCard($card);

        $this->assertEquals($card, $deck->peek());
    }

    /** @test @group Deck */
    public function itCanDrawCard(): void
    {
        $deck = new Deck([]);
        $card = Mockery::mock(Card::class);

        $deck->stackCard($card);

        $this->assertEquals($card, $deck->draw());
        $this->assertEquals(0, $deck->cardsLeft());
    }

    /** @test @group Deck */
    public function itCanDrawFromEmpty(): void
    {
        $deck = new Deck([]);
        $this->assertEquals(null, $deck->draw());
    }

    /** @test @group Deck */
    public function itCanCountCards(): void
    {
        $deck = new Deck([
            Mockery::mock(Card::class),
            Mockery::mock(Card::class),
            Mockery::mock(Card::class),
        ]);
        $this->assertEquals(3, $deck->cardsLeft());
    }
}
