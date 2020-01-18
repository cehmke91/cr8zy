<?php

require_once __DIR__ . '/vendor/autoload.php';

$deckFactory = new \App\Factory\DeckFactory();
$deck = $deckFactory->buildDeck();
$deck->display();
