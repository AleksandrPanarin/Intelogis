<?php

use Intelogis\Company;
use Intelogis\Strategies\FastDelivery;
use Intelogis\Strategies\SlowDelivery;
use Intelogis\Services\FastDelivery as FastDeliveryService;
use Intelogis\Services\SlowDelivery as SlowDeliveryService;

require_once '../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$companies = [];
for ($i = 1; $i <= 20; $i++) {
    $companyAdapter = rand(0, 1) ?
        new FastDelivery(new FastDeliveryService()) : new SlowDelivery(new SlowDeliveryService());
    $companies[] = new Company("Test name - $i", $companyAdapter);
}
/** @var Company $company */
foreach ($companies as $company) {
    $delivery = $company->getDelivery();
    echo $company->getName() . "  " .
        $delivery->getCalculatePriceAndDate('test', 'test', 1) .
        $delivery->getClassName() .
        "<br>";
}
