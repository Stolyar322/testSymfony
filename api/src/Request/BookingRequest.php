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
        #[Assert\Type("\DateTimeInterface")]
        public DateTime $startDate,
        #[Assert\NotNull]
        #[Assert\Type("\DateTimeInterface")]
        public DateTime $birthDate,
        #[Assert\Type("\DateTimeInterface")]
        public ?DateTime $paymentDate
    ) {
    }

    #[Assert\IsTrue(null, "Birth date must be earlier than now date")]
    public function isBirthDate(): bool
    {
        return $this->birthDate <= new DateTime();
    }

    #[Assert\IsTrue(null, "Now date must be earlier than start date")]
    public function isStartDate(): bool
    {
        return $this->startDate >= new DateTime();
    }

    #[Assert\IsTrue(null, "Now date must be earlier than payment date")]
    public function isPaymentDate(): bool
    {
        if ($this->paymentDate === null) {
            return true;
        }

        return $this->paymentDate >= new DateTime();
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getPaymentDate(): ?DateTime
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