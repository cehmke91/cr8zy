<?php

use App\Model\Card;
use App\Model\Deck;
use App\Model\Player;
use App\Service\TableService;
use PHPUnit\Framework\TestCase;

class TableServiceTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test @group TableService */
    public function itCanTellHowManyCardsAreLeftInDeck(): void
    {
        $deck = Mockery::mock(Deck::class);
        $service = new TableService($deck);

        $numCards = 12;

        $deck->expects()
            ->cardsLeft()
            ->once()
            ->andReturns($numCards);

        $this->assertEquals($numCards, $service->cardsInDeck());
    }

    /** @test @group TableService */
    public function itCanDrawFromDeck(): void
    {
        $deck = Mockery::mock(Deck::class);
        $service = new TableService($deck);
        $card = Mockery::mock(Card::class);

        $deck->expects()
            ->draw()
            ->once()
            ->andReturns($card);

        $this->assertEquals($card, $service->draw());
    }

    /** @test @group TableService */
    public function itCanDiscardCards(): void
    {
        $deck = Mockery::mock(Deck::class);
        $service = new TableService($deck);

        $card = Mockery::mock(Card::class);
        $service->discard($card);

        $this->assertEquals($card, $service->currentCard());
    }

    /** @test @group TableService */
    public function itCanSetUpGames(): void
    {
        $deck = Mockery::mock(Deck::class);
        $service = new TableService($deck);
        $card = Mockery::mock(Card::class);

        $deck->expects()
            ->shuffle()
            ->once();
        $deck->expects()
            ->draw()
            ->andReturns($card)
            ->times(8);

        $players = [Mockery::mock(Player::class)];
        $hand = [$card, $card, $card, $card, $card, $card, $card];
        $players[0]->expects()
            ->setHand()
            ->with($hand)
            ->once();

        $service->setupGame($players);
        $this->assertEquals($card, $service->currentCard());
    }
}