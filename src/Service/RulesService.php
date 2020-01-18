<?php

namespace App\Service;

use App\Model\Card;

class RulesService
{
    public function isAllowed(Card $mine, Card $check): bool
    {
        if ($check->getValue() === $mine->getValue()
            || $check->getSuite() === $mine->getSuite()
        ) {
            return true;
        }

        return false;
    }
}
