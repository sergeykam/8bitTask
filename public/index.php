<?php
require __DIR__ . '/../vendor/autoload.php';

use src\megadata\api\locations\Locations;
use src\HttpClient;
use src\megadata\MegaDataException;

$locationsProvider = new Locations(new HttpClient());

try {
    $locations = $locationsProvider->get();
} catch (MegaDataException $me) {
    echo $me->getMessage();
}

foreach ($locations as $location) {
    echo $location;
    echo PHP_EOL;
}