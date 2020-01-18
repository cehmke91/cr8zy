<?php

require_once __DIR__ . '/vendor/autoload.php';

$deckFactory = new \App\Factory\DeckFactory();
$deck = $deckFactory->buildPokerDeck();

$players = ['Jim', 'Tim', 'Fin', 'Andrew'];
$playerFactory = new \App\Factory\PlayerFactory();
$players = $playerFactory->createPlayers($players);

$tableService = new \App\Service\TableService($players, $deck);
$tableService->setupGame();
var_dump($tableService);