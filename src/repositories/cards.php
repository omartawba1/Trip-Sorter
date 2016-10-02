<?php

namespace TripSorter\Repositories;

/**
 * Class Cards
 *
 * @package TripSorter\Repositories
 */
class Cards
{
    /**
     * The cards array.
     *
     * @var array
     */
    private $cards = [
        [
            "Departure"             => "Gerona Airport",
            "Arrival"               => "Stockholm",
            "Transportation"        => "Plane",
            "Transportation_number" => "SK455",
            "Seat"                  => "3A",
            "Gate"                  => "45B",
            "Baggage"               => "334",
        ],
        [
            "Departure"             => "Stockholm",
            "Arrival"               => "New York",
            "Transportation"        => "Plane",
            "Transportation_number" => "SK22",
            "Seat"                  => "7B",
            "Gate"                  => "22",
        ],
        [
            "Departure"      => "Barcelona",
            "Arrival"        => "Gerona Airport",
            "Transportation" => "Bus",
        ],
        [
            "Departure"             => "Madrid",
            "Arrival"               => "Barcelona",
            "Transportation"        => "Train",
            "Transportation_number" => "78A",
            "Seat"                  => "45B",
        ],
    ];
    
    /**
     * Cards constructor.
     * You can use your own cards array rather than the default one
     *
     * @param array $cards
     */
    public function __construct($cards = [])
    {
        if (count($cards)) {
            $this->cards = $cards;
        }
    }
    
    /**
     * get the journey cards.
     *
     * @return array
     */
    public function getCards()
    {
        return $this->cards;
    }
}
