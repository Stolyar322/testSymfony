<?php

namespace App\Trait;

use DateInterval;

trait CheckSeasonTrait
{
    public function isSummerSeason(\DateTime $startDate): bool
    {
        $startSeasonDate = (new \DateTime())->modify('April 1st')->add(DateInterval::createFromDateString('1 year'));
        $endSeasonDate = (new \DateTime())->modify('September 30st')->add(DateInterval::createFromDateString('1 year'));

        if ($startDate >= $startSeasonDate && $startDate <= $endSeasonDate) {
            return true;
        }

        return false;
    }

    public function isWinterSeason(\DateTime $startDate): bool
    {
        $startSeasonDate = (new \DateTime())->modify('October 1st');
        $endSeasonDate = (new \DateTime())->modify('January 14st')->add(DateInterval::createFromDateString('1 year'));

        if ($startDate >= $startSeasonDate && $startDate <= $endSeasonDate) {
            return true;
        }

        return false;
    }

    public function isSpringSeason(\DateTime $startDate): bool
    {
        $startSeasonDate = (new \DateTime())->modify('January 15st')->add(DateInterval::createFromDateString('1 year'));

        if ($startDate >= $startSeasonDate) {
            return true;
        }

        return false;
    }
}