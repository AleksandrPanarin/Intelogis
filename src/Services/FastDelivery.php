<?php

declare(strict_types=1);

namespace Intelogis\Services;

final class FastDelivery
{
    public function getCalculatePriseAndPeriods(string $sourceKladr, string $targetKladr, float $weight)
    {
        return json_encode([
            'price' => rand(1, 5000),
            'period' => rand(3, 90),
            'error' => ''
        ]);
    }
}