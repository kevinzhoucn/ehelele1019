<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Utility\WebUtility\WebJson;
use AppBundle\Utility\WebUtility\WebAuto;

class WebApiControllerTest extends WebTestCase
{
    public function testCategory()
    {
      $client = static::createClient();
      $url = '/api/school/category';

      $crawler = $client->request('GET', $url);

      $this->assertEquals(200, $client->getResponse()->getStatusCode());
      $content = $client->getResponse()->getContent();

      print_r("/n WebApiControllerTest:testCategory:$content: " . $content);
    }
}
