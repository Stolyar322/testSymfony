<?php

namespace App\Trait;

use DateInterval;

trait CheckPaymentDateTrait
{
    public function isCurrentNovemberPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonEndDate = (new \DateTime())->modify('November 30st');

        if ($paymentDate <= $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentDecemberPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('December 1st');
        $seasonEndDate = (new \DateTime())->modify('December 1st');

        if ($paymentDate >= $seasonStartDate && $paymentDate <= $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isNextJanuaryPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('January 1st')->add(DateInterval::createFromDateString('1 year'));
        $seasonEndDate = (new \DateTime())->modify('January 30st')->add(DateInterval::createFromDateString('1 year'));

        if ($paymentDate >= $seasonStartDate && $paymentDate <= $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentMarchPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonEndDate = (new \DateTime())->modify('March 31st');

        if ($paymentDate <= $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentAprilPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('April 1st');
        $seasonEndDate = (new \DateTime())->modify('April 30st');

        if ($paymentDate >= $seasonStartDate && $paymentDate <= $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentMayPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('May 1st');
        $seasonEndDate = (new \DateTime())->modify('May 31st');

        if ($paymentDate >= $seasonStartDate && $paymentDate <= $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentAugustPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonEndDate = (new \DateTime())->modify('August 31st');

        if ($paymentDate <= $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentSeptemberPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('September 1st');
        $seasonEndDate = (new \DateTime())->modify('September 30st');

        if ($paymentDate >= $seasonStartDate && $paymentDate <= $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentOctoberPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('October 1st');
        $seasonEndDate = (new \DateTime())->modify('October 31st');

        if ($paymentDate >= $seasonStartDate && $paymentDate <= $seasonEndDate) {
            return true;
        }

        return false;
    }
}