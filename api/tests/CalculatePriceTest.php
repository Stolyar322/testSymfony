<?php

namespace App\Tests;

use App\Service\PriceCalculator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Constraints\Date;

class CalculatePriceTest extends KernelTestCase
{
    public function testCalculatingPrice()
    {
        self::bootKernel();
        $container = self::getContainer();
        /** @var PriceCalculator $priceCalculator */
        $priceCalculator = $container->get(PriceCalculator::class);

        $this->assertEquals(7000, $priceCalculator->calculate(
            10000,
            new \DateTime('2017-09-01'),
            new \DateTime('2024-12-01'),
            new \DateTime('2024-12-01')
        ));

        $this->assertEquals(6700, $priceCalculator->calculate(
            10000,
            new \DateTime('2017-09-01'),
            new \DateTime('2025-02-03'),
            new \DateTime('2024-10-02')
        ));

        $this->assertEquals(6300, $priceCalculator->calculate(
            10000,
            new \DateTime('2017-10-02'),
            new \DateTime('2025-03-03'),
            new \DateTime('2024-08-02')
        ));

        $this->assertEquals(2000, $priceCalculator->calculate(
            10000,
            new \DateTime('2020-09-01'),
            new \DateTime('2024-12-01'),
            new \DateTime('2024-12-01')
        ));

        $this->assertEquals(1300, $priceCalculator->calculate(
            10000,
            new \DateTime('2020-09-01'),
            new \DateTime('2025-09-01'),
            new \DateTime('2024-10-01')
        ));

        $this->assertEquals(1500, $priceCalculator->calculate(
            10000,
            new \DateTime('2020-09-01'),
            new \DateTime('2025-05-01'),
            new \DateTime('2024-12-01')
            ));

        $this->assertEquals(8700, $priceCalculator->calculate(
            10000,
            new \DateTime('2011-09-01'),
            new \DateTime('2025-04-01'),
            new \DateTime('2025-01-01')
        ));

        $this->assertEquals(9500, $priceCalculator->calculate(
            10000,
            new \DateTime('1999-09-01'),
            new \DateTime('2024-10-01'),
            new \DateTime('2024-04-30')
        ));
    }
}