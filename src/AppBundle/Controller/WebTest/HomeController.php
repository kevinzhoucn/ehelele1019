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

    $restClient = $this->container->get('ci.restclient');
    $test = WebTestFactory::getInstance($name, $restClient);

    $log = $test->runTest($restClient);
    $test01 = $this->container->get('my_web_calculator');
    return $this->render('web_test/index.html.twig', array( 'log' => CheckString::check( $log ) ) );
  }
}
