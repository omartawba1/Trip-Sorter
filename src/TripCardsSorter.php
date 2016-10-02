<?php

namespace TripSorter;

use TripSorter\Repositories\Cards;

/**
 * Class TripSorter
 *
 * @package TripSorter\Src
 */
class TripCardsSorter
{
    /**
     * @var Cards
     */
    private $cards;
    
    /**
     * TripSorter constructor.
     *
     * @param array $cards
     */
    public function __construct($cards = [])
    {
        $this->cards = new Cards($cards);
    }
    
    /**
     * Build the journey cards
     *
     * @return HTML for journey description
     */
    public function buildJourney()
    {
        $cards_array = $this->cards->getCards();
        $cards_count = count($cards_array);

        $sorted_cards = $this->recursiveSort($cards_array, $cards_count, 0);
        $buildHTML    = new BuildHTML();
        
        return $buildHTML->makeHTML($sorted_cards);
    }
    
    /**
     * @param $cards_array
     * @param $cards_count
     * @param $start_index
     *
     * @return $cards_array
     */
    private function recursiveSort($cards_array, $cards_count, $start_index = 0)
    {
        if ($start_index == $cards_count - 1) {
            return $cards_array;
        }
        for ($i = $start_index; $i < $cards_count; $i++) {
            for ($k = $i + 1; $k < $cards_count; $k++) {
                if ($cards_array[$i]['Departure'] == $cards_array[$k]['Arrival']) {
                    $cards_array = $this->swapIndexes($cards_array, $i, $k);
                    
                    return $this->recursiveSort($cards_array, $cards_count, $i);
                }
            }
        }
        
        return $cards_array;
    }
    
    /**
     * @param $cards_array
     * @param $i
     * @param $k
     *
     * @return $cards_array
     */
    private function swapIndexes($cards_array, $i, $k)
    {
        $temp            = $cards_array[$i];
        $cards_array[$i] = $cards_array[$k];
        $cards_array[$k] = $temp;
        
        return $cards_array;
    }
}
