<?php

namespace AppBundle\Utility\Check;

class CheckData {
  public static function dateExpired( $timestamp ) {
    $expired = false;
    $timenow = time();

    // 20 mins
    $timeInterval = 60 * 10;
    $diff = $timenow - $timestamp;
    if ( $diff > $timeInterval ){
      $expired = true;
    }
    return $expired;
  }
}

