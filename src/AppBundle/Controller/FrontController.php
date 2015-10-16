<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller
{
    public function indexAction(Request $request)
    {
      return $this->render('front/index.html.twig');
    }

    public function postsAction(Request $request)
    {
      // replace this example code with whatever you need
      $posts = $this->getDoctrine()
        ->getRepository('AppBundle:Post')
        ->findAll();

      $list = array(1, 2);

      return $this->render('front/index.html.twig', array( 'posts' => $posts ));
    }

    public function showAction(Request $request, $id)
    {
      $post = $this->getDoctrine()
        ->getRepository('AppBundle:Post')
        ->find($id);

      return $this->render('front/posts/show.html.twig', array( 'post' => $post ));
    }

    public function createPost()
    {
        $post = new Post();
        $post->setTitle('A Post');
        $post->setContent('Content');

        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();      
    }
}
