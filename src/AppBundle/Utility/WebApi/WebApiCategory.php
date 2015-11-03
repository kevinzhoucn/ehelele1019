<?php

namespace AppBundle\Utility\WebApi;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Utility\WebApi\WebApiMode;
use AppBundle\Utility\WebUtility\WebAuto;
use AppBundle\Utility\WebUtility\WebJson;
use AppBundle\Entity\Category;

class WebApiCategory extends WebApiMode {
  function getResult() {
    return $this->getResponse();
  }

  function getResponse() {
    $url = WebAuto::webBuildURL();
    $content = $this->getWebResult( $url );
    $result = WebJson::parseJsonString($content);
    return $this->generateCategoryItem( $content, $result);
    // return $result;
  }

  public function getCoursesByCategoryId( $categoryId )
  {
    $url = WebAuto::webBuildGetCoursesURL( $categoryId );
    $content = $this->getWebResult( $url );
    $result = WebJson::parseCoursesJsonString($content);
    return $this->generateCategoryItem( $content, $result, $categoryId);
    // return $result;
  }

  private function getWebResult( $url )
  {
    $restClient = $this->restClient;
    $response = $restClient->get($url);
    $content = $response->getContent();
    return $content;
  }

  private function generateCategoryItem( $rawContent, $mobileContent, $categoryId = null)
  {
    $category = new Category();
    $category->setRawJson($rawContent);
    $category->setMobileJson($mobileContent);
    if ( isset($categoryId) ){
      $category->setAbleskyId($categoryId);
      $category->setType('item');
    } else {
      $category->setAbleskyId(1);
      $category->setType('root');
    }
    $category->setMd5(md5($rawContent));
    return $category;
  }
}
