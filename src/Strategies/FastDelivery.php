<?php

declare(strict_types=1);

namespace Intelogis\Strategies;

use Intelogis\Delivery;
use Intelogis\Services\FastDelivery as FastDeliveryService;

final class FastDelivery implements Delivery
{
    private $fastDelivery;

    public function __construct(FastDeliveryService $fastDelivery)
    {
        $this->fastDelivery = $fastDelivery;
    }

    public function getCalculatePriceAndDate(string $sourceKladr, string $targetKladr, float $weight)
    {
        $dataJson = $this->fastDelivery->getCalculatePriseAndPeriods($sourceKladr, $targetKladr, $weight);
        $data = json_decode($dataJson, true);
        $deliveryDate = (new \DateTime())->modify("+{$data['period']} day")->format('Y-m-d');

        return json_encode([
            'price' => $data['price'],
            'date' => $deliveryDate,
            'error' => $data['error']
        ]);

    }

    public function getClassName(): string
    {
        return __CLASS__;
    }
}