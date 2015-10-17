<?php

namespace AppBundle\Utility\WebTest;

// use Symfony\Component\Config\Definition\Exception\Exception;
// use Symfony\Component\HttpFoundation\Response;
// use AppBundle\Utility\RunTestMode;
use Symfony\Component\Serializer\Serializer;

class WebCalculator
{
  // private $serializer;

  // public function __construct( Serializer $serializer )
  // {
  //   $this->serializer = $serializer;
  // }

  public static function add ( $val01, $val02 ) 
  {
    return $val01 + $val02;
  }

  public static function stringToJson( $str )
  {
    return $this->serializer->serialize($str,'json');
  }
}