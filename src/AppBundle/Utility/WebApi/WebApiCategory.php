<?php

namespace AppBundle\Utility\WebApi;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Utility\WebApi\WebApiMode;
use AppBundle\Utility\WebUtility\WebAuto;
use AppBundle\Utility\WebUtility\WebJson;

class WebApiCategory extends WebApiMode {
  function getResult() {
    return $this->getResponse();
  }

  function getResponse() {
    $url = WebAuto::webBuildURL();
    $content = $this->getWebResult( $url );
    $result = WebJson::parseJsonString($content);
    return $result;
  }

  public function getCoursesByCategoryId( $categoryId )
  {
    $url = WebAuto::webBuildGetCoursesURL( $categoryId );
    $content = $this->getWebResult( $url );
    $result = WebJson::parseCoursesJsonString($content);
    return $result;
  }

  private function getWebResult( $url )
  {
    $restClient = $this->restClient;
    $response = $restClient->get($url);
    $content = $response->getContent();
    return $content;
  }
}
