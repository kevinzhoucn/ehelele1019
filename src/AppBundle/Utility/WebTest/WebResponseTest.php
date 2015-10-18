<?php

namespace AppBundle\Utility\WebTest;

use Symfony\Component\Config\Definition\Exception\Exception;
use AppBundle\Utility\RunTestMode;

class WebResponseTest extends RunTestMode {
  function runTest() {
    $ret = $this->getTest();
    return $ret;
  }

  function getTest() {
    return "Web Response Test";
  }
}
