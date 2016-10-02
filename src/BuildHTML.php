<?php

namespace TripSorter;

/**
 * Class BuildHTML
 * @package TripSorter
 */
class BuildHTML
{
    /**
     * BuildHTML constructor.
     */
    public function __construct()
    {
        
    }
    
    /**
     * @param $sorted_cards
     *
     * @return string
     */
    public function makeHtml($sorted_cards)
    {
        $html_string = "<ol>";
        foreach ($sorted_cards as $card) {
            switch ($card['Transportation']) {
                case "Train":
                    $html_string .= $this->buildTrainHtml($card);
                    break;
                case "Bus":
                    $html_string .= $this->buildBusHtml($card);
                    break;
                case "Plane":
                    $html_string .= $this->buildPlaneHtml($card);
                    break;
            }
        }
        
        return $html_string . $this->arrivalMsg() . "</ol>";
    }
    
    /**
     * @param $card
     *
     * @return string
     */
    private function buildTrainHtml($card)
    {
        return "<li>Take train $card[Transportation_number] from $card[Departure] to $card[Arrival]. " . $this->buildGateHTML($card) . $this->buildSeatHTML($card) . "</li>";
    }
    
    /**
     * @param $card
     *
     * @return string
     */
    private function buildBusHtml($card)
    {
        return "<li>Take the airport bus from $card[Departure] to $card[Arrival]." . $this->buildSeatHTML($card) . "</li>";
    }
    
    /**
     * @param $card
     *
     * @return string
     */
    private function buildPlaneHtml($card)
    {
        return "<li>From $card[Departure], take flight $card[Transportation_number] to $card[Arrival]. " . $this->buildGateHTML($card) . $this->buildSeatHTML($card) . $this->buildBaggageHTML($card) . "</li>";
    }
    
    /**
     * @return string
     */
    private function arrivalMsg()
    {
        return "<li>You have arrived at your final destination.</li>";
    }
    
    /**
     * @param $card
     *
     * @return string
     */
    private function buildBaggageHTML($card)
    {
        return !empty($card['Baggage']) ? ", Baggage drop at ticket counter $card[Baggage]" : ", Baggage will we automatically transferred from your last leg";
    }
    
    /**
     * @param $card
     *
     * @return string
     */
    private function buildGateHTML($card)
    {
        return empty($card['Gate']) ?: "Gate $card[Gate]";
    }
    
    /**
     * @param $card
     *
     * @return string
     */
    private function buildSeatHTML($card)
    {
        return !empty($card['Seat']) ? "Sit in seat $card[Seat]" : "No seat assignment";
    }
}