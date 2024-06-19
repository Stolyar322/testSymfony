<?php

namespace App\Service;

class PriceCalculator
{
    public function calculate(
        int $price,
        \DateTime $birthDate,
        \DateTime $startDate,
        \DateTime $paymentDate
    ): int {

        return $price;
    }
}