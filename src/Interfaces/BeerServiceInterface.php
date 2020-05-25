<?php

interface BeerInterface {

    public function getList();
    public function search($foodFilter);
    public function get($idBeer);

}