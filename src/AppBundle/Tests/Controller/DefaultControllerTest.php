<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Utility\WebUtility\WebJson;
use AppBundle\Utility\WebUtility\WebAuto;

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

    public function testAbleSky()
    {
      $url = WebAuto::webBuildURL();
      var_dump($url);

      $client02 = static::createClient();
      $url = "https://www.baidu.com";
      $crawler = $client02->request('GET', $url);
      // $this->assertEquals(200, $client02->getResponse()->getStatusCode());

      $response_content = $client02->getResponse()->getContent();
      var_dump($response_content);
    }
}
