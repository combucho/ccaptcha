<?php

require_once 'Card.php';

class Deck
{
    private $suits = array();
    private $faces = array();
    private $deck = array();
    private $cards = array();

    public function __construct()
    {
        $this->suits = array(
            "&#9825",   // hearts
            "&#9826",   // diamonds
            "&#9827",   // clubs
            "&#9824");  // spades
        $this->faces = array(
            "six",
            "seven",
            "eight",
            "nine",
            "ten",
            "jack",
            "queen",
            "king",
            "ace");
        foreach ($this->suits as $suit) {
            foreach ($this->faces as $face) {
                $this->deck[] = array(
                    "face" => $face,
                    "suit" => $suit);
            }
        }
        shuffle($this->deck);
    }


    public function getCards($count)
    {
        if ($count > (count($this->deck))) $count = count($this->deck);
        for ($i = 0; $i < $count; $i++) {
            $this->cards[$i] = new Card(
                $this->deck[$i]['suit'],
                $this->deck[$i]['face']);
        }
        return $this->cards;
    }

    public function getCardFaceValue($card)
    {
        return array_search($card->getFace(), $this->faces);
    }

    public function getFaces()
    {
        return $this->faces;
    }
}