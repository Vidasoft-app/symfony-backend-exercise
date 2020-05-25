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
        $this->httpClient = new Client(['base_uri' => 'https://api.punkapi.com/v2/',
                'headers' => [
                    'Accept' => 'application/json'
                ]]
        );
    }

    public function getBeersList()
    {
        try {
            $response = $this->httpClient->get('beers');
            if ($response->getBody()) {
                $beersResponse = json_decode($response->getBody(), true);
                $beerList = array();

                for ($i = 0; $i < count($beersResponse); $i++) {
                    $beer = [
                        "id" => $beersResponse[$i]['id'],
                        "nombre" => $beersResponse[$i]['name'],
                        "descripcion" => $beersResponse[$i]['description']
                    ];
                    array_push($beerList, $beer);
                }

                return $beerList;
            }

        } catch (RequestException $e) {
            return [];
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function searchBeers($foodFilter)
    {
        try {
            $response = $this->httpClient->get('beers', [
                'query' => ['food' => $foodFilter]
            ]);
            if ($response->getBody()) {
                $beersResponse = json_decode($response->getBody(), true);
                $beerList = array();

                for ($i = 0; $i < count($beersResponse); $i++) {
                    $beer = [
                        "id" => $beersResponse[$i]['id'],
                        "nombre" => $beersResponse[$i]['name'],
                        "descripcion" => $beersResponse[$i]['description'],
                        "imagen" => $beersResponse[$i]['image_url'],
                        "slogan" => $beersResponse[$i]['tagline'],
                        "fecha_fabricacion" => $beersResponse[$i]['first_brewed']
                    ];
                    array_push($beerList, $beer);
                }

                return $beerList;
            }
            return [];
        } catch (RequestException $e) {
            return [];
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getBeer($idBeer)
    {
        try {
            $response = $this->httpClient->get('beers/'.$idBeer);

            if ($response->getBody()) {
                return json_decode($response->getBody());
            }
            return [];
        } catch (RequestException $e) {
            return [];
        } catch (\Exception $e) {
            return [];
        }
    }
}