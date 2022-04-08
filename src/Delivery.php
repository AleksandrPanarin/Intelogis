<?php

namespace Intelogis;

interface Delivery
{
    public function getCalculatePriceAndDate(string $sourceKladr, string $targetKladr, float $weight);

    public function getClassName(): string;
}