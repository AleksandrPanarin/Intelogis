<?php

declare(strict_types=1);

namespace Intelogis\Strategies;

use Intelogis\Delivery;
use Intelogis\Services\SlowDelivery as SlowDeliveryService;

final class SlowDelivery implements Delivery
{
    private $slowDelivery;

    public function __construct(SlowDeliveryService $slowDelivery)
    {
        $this->slowDelivery = $slowDelivery;
    }

    public function getCalculatePriceAndDate(string $sourceKladr, string $targetKladr, float $weight)
    {
        $dataJson = $this->slowDelivery->getCalculateCoefficientAndDate($sourceKladr, $targetKladr, $weight);
        $data = json_decode($dataJson, true);

        return json_encode([
            'price' => $data['coefficient'],
            'date' => $data['date'],
            'error' => $data['error']
        ]);
    }

    public function getClassName(): string
    {
        return __CLASS__;
    }
}