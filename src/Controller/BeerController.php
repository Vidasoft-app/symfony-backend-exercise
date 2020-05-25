<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BeerController extends AbstractController
{

    /**
     * @Route("/beer", methods={"GET"}, name="list_beers")
     * @param Request $request
     * @return object json
     */
    public function list(Request $request)
    {
        return new JsonResponse([]);
    }

    /**
     * @Route("/beer/{id}", methods={"GET"}, name="show_beer")
     * @param int $id
     * @return object json
     */
    public function show(int $id)
    {
        return new JsonResponse($id);
    }
}