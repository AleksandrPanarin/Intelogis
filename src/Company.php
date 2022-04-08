<?php

declare(strict_types=1);

namespace Intelogis;

final class Company
{
    private $name;
    private $delivery;

    public function __construct(string $name, Delivery $delivery)
    {
        $this->name = $name;
        $this->delivery = $delivery;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Delivery
     */
    public function getDelivery(): Delivery
    {
        return $this->delivery;
    }
}