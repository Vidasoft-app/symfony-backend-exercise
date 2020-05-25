<?php

namespace App\Services;

use App\Interfaces\BeerServiceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\Dotenv\Dotenv;

class BeerService implements BeerServiceInterface
{
    private $httpClient;

    public function __construct()
    {
        $dotenv = new Dotenv();
        $dotenv->load('../.env');
        $this->httpClient = new Client(['base_uri' => $_ENV['PUNK_DATA_URI']]);
    }

    public function getBeersList()
    {
        $response = $this->httpClient->get('beers');
        return json_decode($response->getBody(), true);
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