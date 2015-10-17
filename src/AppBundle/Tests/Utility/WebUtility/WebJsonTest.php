<?php

namespace AppBundle\Test\Utility\WebUtility;

// use Symfony\Component\Config\Definition\Exception\Exception;
// use Symfony\Component\HttpFoundation\Response;
// use AppBundle\Utility\RunTestMode;
use AppBundle\Utility\WebUtility\WebJson;

class WebJsonTest extends \PHPUnit_Framework_TestCase
{
    public function testStringToJson()
    {
      $str = "{'data': 10}";

      $result = WebJson::stringToJson($str);
      $expect = '10';
      $result = $result->{'data'};
      $this->assertEquals( $expect, $result );
    }
}