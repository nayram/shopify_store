<?php

namespace Tests\Mocks;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\History;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

/**
 *
 */
trait GuzzleMocked
{
  protected $guzzleHistory;

    protected function mockNextGuzzleRequest(Response $response)
    {
        $this->mockNextGuzzleRequests([$response]);
    }

    protected function mockNextGuzzleRequests(array $responses)
    {
        foreach ($responses as $response) {
            if (!($response instanceof Response)) {
                throw new \RuntimeException("Response type incorrect.");
            }
        }

        $client = new Client;

        $mock = new Mock($responses);

        $client->getEmitter()->attach($mock);

        $this->guzzleHistory = new History();

        $client->getEmitter()->attach($this->guzzleHistory);

        $this->app->extend(Client::class, function () use ($client) {
            return $client;
        });
    }

    private function createMockResponse($responseData, $statusCode)
    {
      $headers = ['Content-Type' => 'application/json'];
      $body = json_encode($responseData);

      $response = new Response($statusCode, $headers, $body);

      $mock = new MockHandler([
        $response
    ]);

    $handler = HandlerStack::create($mock);
    $client = new Client(['handler' => $handler]);

    //client instance is bound to the mock here.
    $this->app->instance(Client::class, $client);

    return $response;
}


public function fetch_store_products()
{
  // code...
  $client = new Client(['http_errors' => false]);
  $response = $client->request("GET", "https://3c52d2afe45f8ddc906151993f6fd5b7:f9ea936e7c72d9871ba07484213e9521@madinaclothing.myshopify.com/admin/products.json");
  return $response;
}
}


 ?>
