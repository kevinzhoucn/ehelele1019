<?php

namespace AppBundle\Controller;

// use AppBundle\Entity\Post;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontController extends Controller
{
    public function indexAction(Request $request)
    {
      return $this->render('front/index.html.twig');
    }

    public function showAction(Request $request)
    {
        $restClient = $this->container->get('ci.restclient');
        // $response = $restClient->get('http://www.baidu.com');
        $payloads = 'data=[orgId:123]&timestamp=123&accessToken=9876543';
        $data1 = array("orgId" => "100");
        // $post_data_01 = array( "data" => json_encode($data1), "timestamp" => "456789", "accessToken" => "987654321");
        $post_data_01 = array( "data" => "100", "timestamp" => "456789", "accessToken" => "987654321");
        // $post_data = array( "data" => "234", "timestamp" => "456789", "accessToken" => "987654321");
        // $post_data = json_encode($post_data);
        // $payloads = "{data:100, timestamp:456789, accessToken:987654321}";
        // $post_data = "{data:100, timestamp:456789, accessToken:987654321}";
        $post_data = http_build_query($post_data_01);
        // $post_data = json_encode($post_data);

        $response = $restClient->post('http://accliapac1.cloudapp.net/api/user', $post_data, array(CURLOPT_CONNECTTIMEOUT => 30));
        $content = $response->getContent();
        $data = $content;
        // $data = join(' ', explode(' ', $content));

        // $json_data = json_decode($data);
        // $content = '{"data": 12345}';
        // $json_data = json_decode($content);
        // $data = $json_data->{'data'};//["data"];
        // $data = $post_data_01["data"];
        // $data = array_reverse ( explode(' ', $content) );
        // $data = implode(' ', $data);
        // $data = strtoupper($data);

        // return new Response("Content: " . $restClient);
        // $response->send();
        return new Response("Content: " . $data );
    }

    // public function postsAction(Request $request)
    // {
    //   // replace this example code with whatever you need
    //   $posts = $this->getDoctrine()
    //     ->getRepository('AppBundle:Post')
    //     ->findAll();

    //   $list = array(1, 2);

    //   return $this->render('front/index.html.twig', array( 'posts' => $posts ));
    // }

    // public function showAction(Request $request, $id)
    // {
    //   $post = $this->getDoctrine()
    //     ->getRepository('AppBundle:Post')
    //     ->find($id);

    //   return $this->render('front/posts/show.html.twig', array( 'post' => $post ));
    // }

    // public function createPost()
    // {
    //     $post = new Post();
    //     $post->setTitle('A Post');
    //     $post->setContent('Content');

    //     $em = $this->getDoctrine()->getManager();
    //     $em->persist($post);
    //     $em->flush();      
    // }
}
