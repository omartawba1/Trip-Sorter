<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

$tripSorter   = new TripSorter\TripCardsSorter();
$journey_desc = $tripSorter->buildJourney();

echo "<pre>" . $journey_desc . "</pre>";
