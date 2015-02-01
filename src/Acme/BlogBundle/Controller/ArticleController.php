<?php
/**
 * Description ......
 *
 * @Author: qloog
 * @Date: 14-10-6 10:08
 */

namespace Acme\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\BlogBundle\Entity\Article;
use Acme\BlogBundle\Entity\Comment;

/**
 * @Route("/blog/article")
 */
class ArticleController extends Controller
{
	/**
	 * @Route("/show/{id}")
	 */
	public function showAction($id){
		$article = $this->getDoctrine()->getRepository('AcmeBlogBundle:Article')->findOneByid($id);
		return $this->render('AcmeBlogBundle:Article:show.html.twig', array('article' => $article));
	}

	/**
	 * @Route("/cate/{tname}", defaults={"tname" = null})
	 */
	public function listAction($tname){
		if ($tname != null) {
			$articles = $this->getDoctrine()->getRepository('AcmeBlogBundle:Article')->findByCateTname($tname);
		}else{
			$articles = $this->getDoctrine()->getRepository('AcmeBlogBundle:Article')->findAll();
		}
		return $this->render('AcmeBlogBundle:Article:list.html.twig', array('articles' => $articles));
	}
}