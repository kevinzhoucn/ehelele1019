<?php

namespace AppBundle\Controller\WebTest;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Utility\WebTest\WebTestFactory;
use AppBundle\Utility\Check\CheckString;

class HomeController extends Controller
{
  public function indexAction( $name )
  {
    $log = "log:";

    $test = WebTestFactory::getInstance($name);
    $log = $test->runTest();
    return $this->render('web_test/index.html.twig', array( 'log' => CheckString::check( $log ) ) );
  }
}
