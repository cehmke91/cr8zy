<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Service\DealerService;

$dealer = new DealerService();
$dealer->deal();
