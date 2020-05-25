<?php

namespace App\Interfaces;

interface BeerServiceInterface {

    public function getBeersList();
    public function searchBeers($foodFilter);
    public function getBeer($idBeer);

}