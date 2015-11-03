<?php

namespace AppBundle\Utility\Check;

class CheckDate {
  public static function expired( $timestamp ) {
    $expired = false;
    $timenow = time();

    // 20 mins
    $timeInterval = 60 * 20;
    $diff = $timenow - $timestamp;
    if ( $diff > $timeInterval ){
      $expired = true;
    }
    return $expired;
  }
}

