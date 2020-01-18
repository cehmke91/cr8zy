<?php

namespace App\Service;

use App\Model\Card;

class BrainService
{
    private RulesService $rules;

    public function __construct(
        RulesService $rulesService
    ) {
        $this->rules = $rulesService;
    }

    /**
     * @param Card[] $hand
     * @param Card $match
     * @return int|null index for matched card
     */
    public function findBestCard(array $hand, Card $match): ?int
    {
        /** @var Card $card */
        foreach ($hand as $i => $card) {
            if ($this->rules->canPlayCard($card, $match)) {
                return $i;
            }
        }

        return null;
    }

    public function shouldDrawCard(int $cardsInDeck): bool
    {
        return $this->rules->canDrawCard($cardsInDeck);
    }

    /**
     * @param Card[] $hand
     * @return bool
     */
    public function doIWin(array $hand): bool
    {
        return $this->rules->winningHand($hand);
    }
}
