<?php

namespace AppBundle\Utility\WebUtility;

class WebJson
{
  public static function stringToJson( $str )
  {
    $ret = json_decode($str);

    if ($ret === null && json_last_error() !== JSON_ERROR_NONE) {
      $error_message = sprintf("Failed to parse json string '%s', error: '%s'", $str , json_last_error_msg());
      throw new \LogicException($error_message);
      $ret = '{ "result": 9, "message": ' . $error_message .'}';
    }

    return $ret;
  }

  public static function valueToJson( $json )
  {
    return json_encode($str, JSON_PRETTY_PRINT);
  }
}