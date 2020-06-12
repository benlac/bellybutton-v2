<?php

namespace App\Service;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GoogleUserProvider
{
  private $googleClientId;
  private $googleClientSecret;
  private $httpClient;
  private $generator;

  public function __construct(string $googleClientId, string $googleClientSecret, HttpClientInterface $httpClient, UrlGeneratorInterface $generator)
  {
    $this->googleClientId = $googleClientId;
    $this->googleClientSecret = $googleClientSecret;
    $this->httpClient = $httpClient;
    $this->generator = $generator;
  }

  public function loadUserFromGoogle(string $code)
  {
    $redirect = $this->generator->generate('home', [], UrlGeneratorInterface::ABSOLUTE_URL);
    $url = sprintf("https://oauth2.googleapis.com/token?client_id=%s&client_secret=%s&code=%s&redirect_uri=%s&grant_type=authorization_code", $this->googleClientId, $this->googleClientSecret, $code, $redirect);

    $response = $this->httpClient->request('POST', $url, [
      'headers' => [
        'Content-Type' => 'application/x-www-form-urlencoded',
      ],
      ]);

      $token = $response->toArray()['access_token'];

      $response = $this->httpClient->request('GET', 'https://openidconnect.googleapis.com/v1/userinfo', [
        'headers' => [
          'Authorization' => 'Bearer' .$token
        ]
      ]);
      return $response->toArray();
  }
}