<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\BeerService;

class BeerController extends AbstractController
{

    /**
     * @Route("/beers", methods={"GET"}, name="list_beers")
     * @param Request $request
     * @param BeerService $beerService
     * @return object json
     */
    public function list(Request $request, BeerService $beerService)
    {
        return new JsonResponse($beerService->getBeersList());
    }

    /**
     * @Route("/beers/{id}", methods={"GET"}, name="show_beer")
     * @param int $id
     * @param BeerService $beerService
     * @return object json
     */
    public function show(int $id, BeerService $beerService)
    {
        return new JsonResponse($beerService->getBeer($id));
    }
}