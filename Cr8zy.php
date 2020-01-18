<?php

date_default_timezone_set("Europe/Amsterdam");

require_once __DIR__ . '/vendor/autoload.php';

$deckFactory = new \App\Factory\DeckFactory();
$deck = $deckFactory->buildPokerDeck();

$players = ['Jim', 'Tim', 'Fin', 'Andrew'];
$playerFactory = new \App\Factory\PlayerFactory();
$players = $playerFactory->createPlayers($players);

$tableService = new \App\Service\TableService($deck);
$rulesService = new \App\Service\RulesService();
$brainService = new \App\Service\BrainService($rulesService);
$ioService = new \App\Service\IOService();

$game = new \App\Controller\GameController(
    $players,
    $tableService,
    $brainService,
    $ioService
);

$game->start();