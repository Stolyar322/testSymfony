<?php

namespace App\Service;

use App\Enum\DiscountEnum;
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
            $this->isWinterSeason($startDate) && $this->isCurrentMarchPaymentPeriod($paymentDate) => DiscountEnum::SEVEN_PERCENT_DISCOUNT,
            $this->isSummerSeason($startDate) && $this->isCurrentDecemberPaymentPeriod($paymentDate) ||
            $this->isSpringSeason($startDate) && $this->isCurrentSeptemberPaymentPeriod($paymentDate) ||
            $this->isWinterSeason($startDate) && $this->isCurrentAprilPaymentPeriod($paymentDate) => DiscountEnum::FIVE_PERCENT_DISCOUNT,
            $this->isSummerSeason($startDate) && $this->isNextJanuaryPaymentPeriod($paymentDate) ||
            $this->isSpringSeason($startDate) && $this->isCurrentOctoberPaymentPeriod($paymentDate) ||
            $this->isWinterSeason($startDate) && $this->isCurrentMayPaymentPeriod($paymentDate) => DiscountEnum::THREE_PERCENT_DISCOUNT,
            default => 0,
        };
    }

    private function getAgeDiscount(\DateTime $birthDate): float
    {
        return match (true) {
            $this->isOlderThreeAge($birthDate) => DiscountEnum::EIGHTY_PERCENT_DISCOUNT,
            $this->isOlderSixAge($birthDate) => DiscountEnum::THIRTY_PERCENT_DISCOUNT,
            $this->isOlderTwelveAge($birthDate) => DiscountEnum::TEN_PERCENT_DISCOUNT,
            default => 0,
        };
    }
}