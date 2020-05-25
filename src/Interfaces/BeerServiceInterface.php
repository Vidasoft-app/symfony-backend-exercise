<?php

interface BeerInterface {

    public function getBeersList();
    public function searchBeers($foodFilter);
    public function getBeer($idBeer);

}