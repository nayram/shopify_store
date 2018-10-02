<?php
namespace App\Utils;


/**
 *
 */
class ApiClient
{

  protected $apiClient;

  function __construct()
  {
    // code..
  }

  public function getProducts()
  {
    // code...
    try {
      $this->apiClient = new Client();
      $response = $this->client->get(,[
                                  "headers"=>[
                                    "Authorization"=>env("ASORIBA_STAGE_PUB_KEY")
                                  ]
                              ]);
       return $response;

    } catch (\Exception $e) {
      if ($e instanceof ClientException || $e instanceof ServerException) {
        # code...
        if ($e->hasResponse()) {
          # code...
          return $e->getResponse();
        }
      }else{
        return $e->getMessage();
        Log::info($e->getMessage());
      }
    }
  }
}


?>
