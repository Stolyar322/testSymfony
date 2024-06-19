<?php

namespace App\Trait;

use DateInterval;

trait CheckPaymentDateTrait
{
    public function isCurrentNovemberPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonEndDate = (new \DateTime())->modify('December 1st 00:00:00');

        if ($paymentDate < $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentDecemberPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('December 1st 00:00:00');
        $seasonEndDate = (new \DateTime())->modify('January 1st 00:00:00')->add(DateInterval::createFromDateString('1 year'));

        if ($paymentDate >= $seasonStartDate && $paymentDate < $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isNextJanuaryPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('January 1st 00:00:00')->add(DateInterval::createFromDateString('1 year'));
        $seasonEndDate = (new \DateTime())->modify('February 1st 00:00:00')->add(DateInterval::createFromDateString('1 year'));

        if ($paymentDate >= $seasonStartDate && $paymentDate < $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentMarchPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonEndDate = (new \DateTime())->modify('April 1st 00:00:00');

        if ($paymentDate < $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentAprilPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('April 1st 00:00:00');
        $seasonEndDate = (new \DateTime())->modify('May 1st 00:00:00');

        if ($paymentDate >= $seasonStartDate && $paymentDate < $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentMayPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('May 1st 00:00:00');
        $seasonEndDate = (new \DateTime())->modify('June 1st 00:00:00');

        if ($paymentDate >= $seasonStartDate && $paymentDate < $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentAugustPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonEndDate = (new \DateTime())->modify('September 1st 00:00:00');

        if ($paymentDate < $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentSeptemberPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('September 1st 00:00:00');
        $seasonEndDate = (new \DateTime())->modify('October 1st 00:00:00');

        if ($paymentDate >= $seasonStartDate && $paymentDate < $seasonEndDate) {
            return true;
        }

        return false;
    }

    public function isCurrentOctoberPaymentPeriod(\DateTime $paymentDate): bool
    {
        $seasonStartDate = (new \DateTime())->modify('October 1st 00:00:00');
        $seasonEndDate = (new \DateTime())->modify('November 1st 00:00:00');

        if ($paymentDate >= $seasonStartDate && $paymentDate < $seasonEndDate) {
            return true;
        }

        return false;
    }
}