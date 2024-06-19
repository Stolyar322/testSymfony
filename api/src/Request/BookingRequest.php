<?php

namespace App\Request;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

class BookingRequest
{
    public function __construct(
        #[Assert\NotNull]
        public int $price,
        #[Assert\NotNull]
        public DateTime $startDate,
        #[Assert\NotNull]
        public DateTime $birthDate,
        #[Assert\NotNull]
        public DateTime $paymentDate
    ) {
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getPaymentDate(): DateTime
    {
        return $this->paymentDate;
    }

    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }
}