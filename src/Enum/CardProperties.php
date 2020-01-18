<?php

namespace App\Enum;

final class CardProperties
{
    public const SUITES = [
        'DIAMONDS'  => '♦',
        'CLUBS'     => '♣',
        'HEART'     => '♥',
        'SPADES'    => '♠',
    ];

    public const VALUES = [
        '2'     => '2',
        '3'     => '3',
        '4'     => '4',
        '5'     => '5',
        '6'     => '6',
        '7'     => '7',
        '8'     => '8',
        '9'     => '9',
        '10'    => '10',
        'JACK'  => 'J',
        'QUEEN' => 'Q',
        'KING'  => 'K',
        'ACE'   => 'A',
    ];
}
