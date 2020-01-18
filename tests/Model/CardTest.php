<?php

use App\Model\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    private Card $testCard;

    public function setUp(): void
    {
        $this->testCard = new Card('testSuite', 'testValue');
        parent::setUp();
    }

    /** @test @group Card*/
    public function itReturnsSuite(): void
    {
        $this->assertEquals('testSuite', $this->testCard->getSuite());
    }

    /** @test @group Card */
    public function itReturnsValue(): void
    {
        $this->assertEquals('testValue', $this->testCard->getValue());
    }

    /** @test */
    public function itCanDisplay(): void
    {
        $this->assertEquals('testSuitetestValue', $this->testCard->display());
    }
}
