<?php

require_once 'Deck.php';
define("CARDS_IN_HAND", 6);
session_start();

$deck = new Deck();
$cards = $deck->getCards(CARDS_IN_HAND + 2);
$playCard = array_shift($cards);
$trumpCard = array_shift($cards);

$winCard = $playCard;

$handSuits = array();
$handTrumps = array();

foreach ($cards as $card) {
    if ($playCard->getSuit() != $trumpCard->getSuit() &
        $card->getSuit() == $playCard->getSuit() &
        $deck->getCardFaceValue($card) > $deck->getCardFaceValue($playCard))
        array_push($handSuits, $card);

    if ($playCard->getSuit() != $trumpCard->getSuit() &
        $card->getSuit() == $trumpCard->getSuit())
        array_push($handTrumps, $card);

    if ($playCard->getSuit() == $trumpCard->getSuit() &
        $card->getSuit() == $trumpCard->getSuit() &
        $deck->getCardFaceValue($card) > $deck->getCardFaceValue($playCard))
        array_push($handTrumps, $card);
}

$min = count($deck->getFaces());
if ($handTrumps) foreach ($handTrumps as $handTrump) {
    if ($deck->getCardFaceValue($handTrump) < $min) {
        $winCard = $handTrump;
        $min = $deck->getCardFaceValue($handTrump);
    }
}

$min = count($deck->getFaces());
if ($handSuits) foreach ($handSuits as $handSuit) {
    if ($deck->getCardFaceValue($handSuit) < $min) {
        $winCard = $handSuit;
        $min = $deck->getCardFaceValue($handSuit);
    }
}

array_push($cards, $playCard, $trumpCard);

$_SESSION['cards'] = $cards;
$_SESSION['winner'] = array_search($winCard, $cards);

/*DEBUG start*/

//echo "Play card: ";
//Card::printCard($playCard);
//
//echo "Trump card: ";
//Card::printCard($trumpCard);
//
//foreach ($cards as $card) {
//    Card::printCard($card);
//}
//
//foreach ($handSuits as $handSuit) {
//    echo "Suit in hand: ";
//    Card::printCard($handSuit);
//}
//
//foreach ($handTrumps as $handTrump) {
//    echo "Trump in hand: ";
//    Card::printCard($handTrump);
//}
//
//echo "Win card: ";
//Card::printCard($winCard);
//
//var_dump($_SESSION['cards']);

/*DEBUG stop*/
