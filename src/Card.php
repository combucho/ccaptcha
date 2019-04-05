<?php


class Card
{
    private $suit;
    private $face;

    public function __construct($suit, $face)
    {
        $this->suit = $suit;
        $this->face = $face;
    }

    public function getSuit()
    {
        return $this->suit;
    }

    public function getFace()
    {
        return $this->face;
    }

    // for debug purpose
    public static function printCard($card)
    {
        echo $card->getFace() . " " . $card->getSuit() . "<br />";
    }
}