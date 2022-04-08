<?php

declare(strict_types=1);

namespace Intelogis\Services;

final class SlowDelivery
{
    private const BASE_COAST = 150;

    public function getCalculateCoefficientAndDate(string $sourceKladr, string $targetKladr, float $weight)
    {
        $date = new \DateTime();
        $amountDays = rand(3, 90);
        $date->modify("+$amountDays day");
        $coefficient = rand(1, 300);

        return json_encode([
            'coefficient' => $coefficient * self::BASE_COAST,
            'date' => $date->format('Y-m-d'),
            'error' => ''
        ]);
    }
}