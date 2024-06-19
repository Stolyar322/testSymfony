<?php

namespace App\Controller;

use App\Request\BookingRequest;
use App\Service\PriceCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    #[Route('/api/booking/price', methods: ['POST'])]
    public function calculatePrice(#[MapRequestPayload]BookingRequest $request, PriceCalculator $priceCalculator): JsonResponse
    {
        $price = $priceCalculator->calculate(
            $request->getPrice(),
            $request->getBirthDate(),
            $request->getStartDate(),
            $request->getPaymentDate()
        );

        return new JsonResponse(['price' => $price]);
    }
}