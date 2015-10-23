<?php

namespace AppBundle\Controller\Api\Mobile;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiBaseController extends Controller
{
    public function userAction(Request $request)
    {
      // replace this example code with whatever you need

      $data = $request->get('data');
      $timestamp = $request->get('timestamp');
      $accessToken = $request->get('accessToken');
      // $data = $request->request->get('data');
      
      $logger = $this->get('my_service.logger');
      $logger->debug(date('Y-m-d H:i:s'));

      // return new Response("{ data: ". $data ." }");
      $logger->debug($request);      
      return new Response("{ data: ". $data . ", timestamp: " . $timestamp . ", accessToken: " . $accessToken ." }");
    }
}
