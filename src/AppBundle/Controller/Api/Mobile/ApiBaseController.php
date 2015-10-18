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
      return new Response("{ data: { value: 'empty' } }");
    }
}
