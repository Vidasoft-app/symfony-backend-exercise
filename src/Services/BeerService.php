<?php

namespace App\Services;

use App\Interfaces\BeerServiceInterface;

class BeerService implements BeerServiceInterface
{

    public function __construct()
    {

    }

    public function getBeersList()
    {
        return ["nombre" => "ejemplo 1"];
    }

    public function searchBeers($foodFilter)
    {
        return ["nombre" => $foodFilter];
    }

    public function getBeer($idBeer)
    {
        return ["id" => $idBeer];
    }
}