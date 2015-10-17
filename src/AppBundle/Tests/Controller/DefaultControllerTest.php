<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Utility\WebUtility\WebJson;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        // $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
        $this->assertContains('Home page', $client->getResponse()->getContent());
    } 

    public function testApiUserPost()
    {
      $client = static::createClient();
      $data = array( "data" => "100", "timestamp" => "456789", "accessToken" => "987654321");
      $crawler = $client->request('POST', '/api/user', $data);
      $this->assertEquals(200, $client->getResponse()->getStatusCode());
      // var_dump($client->getResponse()->getContent());
      $data_value = "100";
      $response_content = $client->getResponse()->getContent();
      // var_dump($response_content);

      // $response_content = '{"data":"100", "timestamp":"456789", "accessToken":"987654321" }';
      $response_json = WebJson::stringToJson($response_content);
      $response_data_value = $response_json->{'data'};
      $this->assertEquals($data_value, $response_data_value);
    }
}
