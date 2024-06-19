<?php

namespace App\Tests;

use App\Service\PriceCalculator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculatePriceTest extends KernelTestCase
{
    public function testCalculatingPrice()
    {
        self::bootKernel();
        $container = self::getContainer();
        /** @var PriceCalculator $priceCalculator */
        $priceCalculator = $container->get(PriceCalculator::class);
        $price = 3;

        $this->assertEquals($price, $priceCalculator->calculate(3, new \DateTime(), new \DateTime(), new \DateTime()));
    }
}