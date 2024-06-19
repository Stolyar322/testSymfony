<?php

namespace App\Trait;

trait CheckAgeTrait
{
    public function isOlderThreeAge(\DateTime $birthDate): bool
    {
        $age = $this->getAge($birthDate);

        if ($age >= 3 && $age < 6) {
            return true;
        }

        return false;
    }

    public function isOlderSixAge(\DateTime $birthDate): bool
    {
        $age = $this->getAge($birthDate);

        if ($age >= 6 && $age < 12) {
            return true;
        }

        return false;
    }

    public function isOlderTwelveAge(\DateTime $birthDate): bool
    {
        $age = $this->getAge($birthDate);

        if ($age >= 12 && $age < 18) {
            return true;
        }

        return false;
    }

    public function getAge(\DateTime $birthDate): int
    {
        $now = new \DateTime();
        return date_diff($now, $birthDate)->y;
    }
}