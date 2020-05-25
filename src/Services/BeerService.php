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
        try {
            $response = $this->httpClient->get('beers');
            return json_decode($response->getBody(), true);

        } catch (RequestException $e) {
            return [];
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function searchBeers($foodFilter)
    {
        try {
            $response = $this->httpClient->get('beers?food='.$foodFilter);
            return json_decode($response->getBody(), true);

        } catch (RequestException $e) {
            return [];
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function getBeer($idBeer)
    {
        try {
            $response = $this->httpClient->get('beers/'.$idBeer);
            return json_decode($response->getBody(), true);

        } catch (RequestException $e) {
            return [];
        } catch (\Exception $ex) {
            return [];
        }
    }
}