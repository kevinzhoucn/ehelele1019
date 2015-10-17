<?php

namespace AppBundle\Test\Utility\WebTest;

// use Symfony\Component\Config\Definition\Exception\Exception;
// use Symfony\Component\HttpFoundation\Response;
// use AppBundle\Utility\RunTestMode;
use AppBundle\Utility\WebTest\WebCalculator;

class WebCalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd() 
    {
      // $cal = new WebCalculator();
      // $cal = $this->container->get('my_web_calculator');

      $result = WebCalculator::add( 20, 30 );

      $this->assertEquals( 50, $result );
    }

    public function testStringToJson()
    {
      $str = "{data: 10}";
      // $cal = new WebCalculator();
      // $cal = $this->container->get('my_web_calculator');

      $result = WebCalculator::stringToJson($cal);
      $expect = array('data' => '10');
      $this->assertEquals( $expect, $result );
    }
}