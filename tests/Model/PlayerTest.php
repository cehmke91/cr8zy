<?php

use App\Model\Card;
use App\Model\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test @group Player */
    public function itReturnsName(): void
    {
        $player = new Player('testPlayer');
        $this->assertEquals('testPlayer', $player->getName());
    }

    /** @test @group Player */
    public function itOperatesHand(): void
    {
        $player = new Player('testPlayer');
        $hand = [1, 2, 3];
        $player->setHand($hand);

        $this->assertEquals($hand, $player->getHand());
    }

    /** @test @group Player */
    public function itCanGetCard(): void
    {
        $player = new Player('testPlayer');
        $card1 = Mockery::mock(Card::class);
        $card2 = Mockery::mock(Card::class);
        $player->setHand([$card1, $card2]);

        $this->assertEquals($card2, $player->getCard(1));
    }

    /** @test @group Player */
    public function itCanHandleBadGetCardIndex(): void
    {
        $player = new Player('testPlayer');
        $card1 = Mockery::mock(Card::class);
        $player->setHand([$card1]);

        $this->assertEquals(null, $player->getCard(1));
    }

    /** @test @group Player */
    public function itCanAddCardToHand(): void
    {
        $player = new Player('testPlayer');
        $card1 = Mockery::mock(Card::class);
        $player->setHand([$card1]);

        $card2 = Mockery::mock(Card::class);
        $player->addCard($card2);

        $this->assertEquals([$card1, $card2], $player->getHand());
    }
}
