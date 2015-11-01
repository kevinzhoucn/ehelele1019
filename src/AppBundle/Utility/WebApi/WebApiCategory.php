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
    $restClient = $this->restClient;    
    $url = WebAuto::webBuildURL();    
    $response = $restClient->get($url);
    $content = $response->getContent();

    $result = WebJson::parseJsonString($content);
    return $result;
  }
}
