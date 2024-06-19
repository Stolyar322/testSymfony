<?php

namespace App\Service;

use App\Trait\CheckAgeTrait;
use App\Trait\CheckPaymentDateTrait;
use App\Trait\CheckSeasonTrait;

class DiscountCalculator
{
    use CheckAgeTrait;
    use CheckSeasonTrait;
    use CheckPaymentDateTrait;

    public function calculateDiscount(
        \DateTime $startDate,
        \DateTime $birthDate,
        ?\DateTime $paymentDate
    ): float {
        $seasonDiscount = 0;
        $ageDiscount = $this->getAgeDiscount($birthDate);
        if ($paymentDate !== null) {
            $seasonDiscount = $this->getSeasonDiscount($startDate, $paymentDate);
        }

        return $ageDiscount + $seasonDiscount;
    }

    private function getSeasonDiscount(\DateTime $startDate, \DateTime $paymentDate): float
    {
        return match (true) {
            $this->isSummerSeason($startDate) && $this->isCurrentNovemberPaymentPeriod($paymentDate) ||
            $this->isSpringSeason($startDate) && $this->isCurrentAugustPaymentPeriod($paymentDate) ||
            $this->isWinterSeason($startDate) && $this->isCurrentMarchPaymentPeriod($paymentDate) => 0.07,
            $this->isSummerSeason($startDate) && $this->isCurrentDecemberPaymentPeriod($paymentDate) ||
            $this->isSpringSeason($startDate) && $this->isCurrentSeptemberPaymentPeriod($paymentDate) ||
            $this->isWinterSeason($startDate) && $this->isCurrentAprilPaymentPeriod($paymentDate) => 0.05,
            $this->isSummerSeason($startDate) && $this->isNextJanuaryPaymentPeriod($paymentDate) ||
            $this->isSpringSeason($startDate) && $this->isCurrentOctoberPaymentPeriod($paymentDate) ||
            $this->isWinterSeason($startDate) && $this->isCurrentMayPaymentPeriod($paymentDate) => 0.03,
            default => 0,
        };
    }

    private function getAgeDiscount(\DateTime $birthDate): float
    {
        return match (true) {
            $this->isOlderThreeAge($birthDate) => 0.8,
            $this->isOlderSixAge($birthDate) => 0.3,
            $this->isOlderTwelveAge($birthDate) => 0.1,
            default => 0,
        };
    }
}