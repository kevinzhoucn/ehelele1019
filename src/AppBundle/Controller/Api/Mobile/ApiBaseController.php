<?php

namespace AppBundle\Controller\Api\Mobile;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Utility\WebApi\WebApiFactory;
use AppBundle\Utility\Check\CheckString;
use AppBundle\Entity\Category;
use AppBundle\Utility\Check\CheckData;

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
      $result = sprintf('{ "data": "%s", "timestamp":"%s", "accessToken": "%s"}', $data , $timestamp, $accessToken);
      // $result = sprintf("{ 'data': '%s', 'timestamp':'%s', 'accessToken': '%s'}", $data , $timestamp, $accessToken);
      return new Response($result);
    }

    public function categoryActoin(Request $request, $id)
    {
      $result = $this->buildCategoryResponse( $id );
      return new Response(CheckString::check( $result->getMobileJson() ));
    }

    private function buildCategoryResponse( $categoryId = null )
    {
      $category = $this->findCategory( $categoryId );      
      var_dump($category->getUpdated());

      if (   !isset($category) || 
           ( isset($category) && CheckData::dateExpired($category->getUpdated()->getTimestamp()) ) 
         )
      {
        $restClient = $this->container->get('ci.restclient');
        $webApi = WebApiFactory::getInstance('categories', $restClient);

        $original_md5 = "";
        if ( isset($category) ) $original_md5 = $category->getMd5();

        // $category;
        // echo $categoryId;

        if( $categoryId != 1 ) {
          $category = $webApi->getCoursesByCategoryId($categoryId);
        } else {
          $category = $webApi->getResult();
        }

        $new_md5 = $category->getMd5();
        if ( $original_md5 != $new_md5 ) $this->saveCategory($category);
      }    

      return $category;
    }

    private function saveCategory( $category )
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($category);
      $em->flush();
    }

    private function findCategory( $categoryId = null )
    {
      $categoryRepo = $this->getDoctrine()
                           ->getRepository('AppBundle:Category');
      $category = null;
      if( isset($categoryId) ){
        $category = $categoryRepo->findOneBy(array('ablesky_id' => $categoryId), array('updated' => 'DESC'));
      } else {
        $category = $categoryRepo->findOneBy(array('type' => 'root'), array('updated' => 'DESC'));
      }

      return $category;
    }
}
