<?php
use Symfony\Contracts\HttpClient\HttpClientInterface;

namespace Controllers;

class CoinValuesController extends Controller
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $response = $client->request('GET', 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest', [
            'headers' => [
                'X-CMC_PRO_API_KEY' => '43caf43b-7511-45dd-938f-108658cd50ce',
            ],
        ]);
        
        echo $this->twig->render('userPage.twig', $response);
    }
    
}