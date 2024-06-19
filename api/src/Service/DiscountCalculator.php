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
        \DateTime $paymentDate,
        \DateTime $birthDate
    ): float {
        $ageDiscount = $this->getAgeDiscount($birthDate);
        $seasonDiscount = $this->getSeasonDiscount($startDate, $paymentDate);

        return $ageDiscount + $seasonDiscount;
    }

    private function getSeasonDiscount(\DateTime $startDate, \DateTime $paymentDate): float
    {
        return match (true) {
            $this->isSummerSeason($startDate) && $this->isCurrentNovemberPaymentPeriod($paymentDate) ||
            $this->isSpringSeason($startDate) && $this->isCurrentMarchPaymentPeriod($paymentDate) ||
            $this->isWinterSeason($startDate) && $this->isCurrentAugustPaymentPeriod($paymentDate) => 0.07,
            $this->isSummerSeason($startDate) && $this->isCurrentDecemberPaymentPeriod($paymentDate) ||
            $this->isSpringSeason($startDate) && $this->isCurrentAprilPaymentPeriod($paymentDate) ||
            $this->isWinterSeason($startDate) && $this->isCurrentSeptemberPaymentPeriod($paymentDate) => 0.05,
            $this->isSummerSeason($startDate) && $this->isNextJanuaryPaymentPeriod($paymentDate) ||
            $this->isSpringSeason($startDate) && $this->isCurrentMayPaymentPeriod($paymentDate) ||
            $this->isWinterSeason($startDate) && $this->isCurrentOctoberPaymentPeriod($paymentDate) => 0.03,
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