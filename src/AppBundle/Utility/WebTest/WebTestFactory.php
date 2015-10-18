<?php

namespace AppBundle\Utility\WebTest;
use AppBundle\Utility\RunTestMode;
use AppBundle\Utility\WebTest\WebResponseTest;

class WebTestFactory {
  private function __construct() {
  }

  static function getInstance( $name ) {
    switch ( $name ) {
      case ( 'response' ):
        return new WebResponseTest();
      default:
        return new WebTestDefault();
    }
  }
}

class WebTestDefault extends RunTestMode {
  function runTest() {
    return "Default class: runTest();";
  }
}
