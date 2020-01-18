<?php

namespace App\Model;

class Card
{
    private string $suite;
    private string $value;

    public function __construct(string $suite, string $value)
    {
        $this->value = $value;
        $this->suite = $suite;
    }

    public function display(): string
    {
        return $this->suite . $this->value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getSuite(): string
    {
        return $this->suite;
    }
}
