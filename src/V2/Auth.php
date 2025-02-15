<?php
namespace Selistore\PrintfulApi\V2;

use Selistore\PrintfulApi\V2\Localisation;
use GuzzleHttp\Client;
use Exception;

/**
 * Class Auth
 * 
 * This class handles authentication and API requests to the Printful API.
 */
class Auth
{
  /**
   * Localisation
   */
  use Localisation;
  
  /**
   * Constructs a new Auth instance.
   *
   * @param string $api_key The API key for authentication.
   * @param string $locale The locale for the API requests.
   */
  public function __construct(private string $api_key, public string $locale = 'en_US') {
    //
  }

  /**
   * Returns the headers for the API request.
   *
   * @return array The headers array.
   */
  private function headers() {
    return [
      'headers' => [
        'Authorization' => 'Bearer ' . $this->api_key,
        'X-PF-Language' => $this->getLocale(),
      ]
    ];
  }

  /**
   * Makes an API request.
   *
   * @param string $url The URL for the API request.
   * @param string $method The HTTP method for the request, default is 'GET'.
   * @return mixed The response body.
   */
  public function make(string $url, $method = 'GET') {
    // return file_get_contents(dirname(dirname(dirname(__DIR__))) . '/PrintfulWebSoc/TestAuthResponse.json');

    $this->client = new Client($this->headers());
    
    try {
      $this->response = $this->client->request($method, $url);

      if (! $this->isRateLimited()) {
        return $this->response->getBody();
      } else {
        $timeout = $this->response->getHeaderLine('X-Ratelimit-Reset') * 1000;
        
        sleep($timeout);
        
        $this->make($url);
      }
    } catch(Exception $e) {
      die($e);
    }
  }

  /**
   * Checks if the API request was rate limited.
   *
   * @return bool True if rate limited, false otherwise.
   */
  public function isRateLimited() {
    return $this->response->getStatusCode() == 429;
  }
}