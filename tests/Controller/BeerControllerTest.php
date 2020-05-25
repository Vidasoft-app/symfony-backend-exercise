<?php

namespace App\Tests\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BeerControllerTest extends WebTestCase
{
    private $httpClient;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->httpClient = new Client(['base_uri' => 'https://api.punkapi.com/v2/',
                'headers' => [
                    'Accept' => 'application/json'
                ]]
        );
    }

    /**
     * @test
     * @testdox "Conecta al API"
     */
    public function test_connect_beers()
    {
        $response = $this->httpClient->get('beers');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     * @testdox "Conecta a ver solo 1 beer"
     */
    public function test_show_beer()
    {
        $response = $this->httpClient->get('beers/1');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     * @testdox "Conecta a hacer una busqueda"
     */
    public function test_search_beer()
    {
        $response = $this->httpClient->get('beers?food=Spicy%20chicken');
        $this->assertEquals(200, $response->getStatusCode());
    }
}