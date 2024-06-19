<?php

namespace App\Service;

class PriceCalculator
{
    private DiscountCalculator $discountCalculator;
    public function __construct(DiscountCalculator $discountCalculator)
    {
        $this->discountCalculator = $discountCalculator;
    }

    public function calculate(
        int $price,
        \DateTime $birthDate,
        \DateTime $startDate,
        \DateTime $paymentDate
    ): int {
        $discount = $this->discountCalculator->calculateDiscount(
            $startDate,
            $paymentDate,
            $birthDate
        );

        return $price * (1 - $discount);
    }
}