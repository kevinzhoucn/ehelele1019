<?php

namespace AppBundle\Utility\WebUtility;

class WebAuto
{
  public static function makeUp()
  {
    $body = '
      <p>I like pickles and herring.</p>
      <a href="pickle.php"><img src="pickle.jpg"/>A pickle picture</a>
      I have a herringbone-patterned toaster cozy.
      <herring>Herring is not a real HTML element!</herring>
    ';

    $words = array('pickle', 'herring');
    $replacements = array();
    foreach ($words as $i => $word) {
      $replacements[] = "<span class='word-$i'>$word</span>";
    }

    $parts = preg_split("{(<(?:\"[^\"]*\"|'[^'}*'|[^'\">])*>)}",
                        $body,
                        -1,
                        PREG_SPLIT_DELIM_CAPTURE);
    foreach ($parts as $i => $part) {
      if (isset($part[0]) && ($part[0] == '<')) { continue; }
      $parts[$i] = str_replace( $words, $replacements, $part );
    }

    $body = implode('', $parts);

    return $body;
  }

  public static function makePregSplit()
  {
    $result = preg_split("/[\s,]+/", "hypertext language, programming");
    return $result;
  }

  public static function webBuildURL()
  {
    $orgParams = array();
    $orgParams['organizationId'] = 8778 ;
    $orgParams['optDate'] = 1446111630;

    $orgInfoWithKey = "8778" . "|" . "1446111630" . "|" . "E1F244781A9F4F42BD7E6ADB2316B0FF";
    $accessToken = md5($orgInfoWithKey);
    $orgParams['accessToken'] = $accessToken;

    $url = "http://www.ablesky.com/organizationCategory.do?action=listOrgInteriorCategoryTree&";
    $params = http_build_query($orgParams);
    // print_r($params);

    $url = $url . $params;
    
    return $url;
  }
}