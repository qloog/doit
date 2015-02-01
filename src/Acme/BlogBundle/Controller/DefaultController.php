<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Acme\BlogBundle\Entity\Category;
use Acme\BlogBundle\Entity\Article;
use Acme\BlogBundle\Entity\Comment;
use Acme\BlogBundle\Document\Comment as MongoComment;

/**
 * @Route("/blog")
 */
class DefaultController extends Controller
{
	/**
	 * @Route("/")
	 */
    public function indexAction()
    {
	    $data = array('articles' => $this->getArticles());
	    return $this->render('AcmeBlogBundle:Default:index.html.twig', $data);
    }

    public function getArticles()
    {
        $articles = $this->getDoctrine()->getRepository('AcmeBlogBundle:Article')->findAll();
	    return $articles;
    }

	/**
	 * @Route("/create", name="acme_blog_create")
	 */
	public function createAction()
	{
		$article_arr = array(
			array('title' => 'PHP基础', 'content' => 'echo var_dump'),
			array('title' => 'PHP函数', 'content' => '$a = function(){}'),
			array('title' => 'PHP-OOP', 'content' => '面向对象'),
		);
		$cate_arr = array(
			array('name' => 'PHP课程', 'tname' => 'php'),
			array('name' => 'rails课程', 'tname' => 'rails'),
			array('name' => 'nodejs课程', 'tname' => 'nodejs'),
			array('name' => 'angularjs课程', 'tname' => 'angularjs'),
			array('name' => 'IOS课程', 'tname' => 'ios'),
			array('name' => 'Andorid课程', 'tname' => 'andorid'),
		);
		$comment_arr = array(
			array('content' => '非常好的课程'),
			array('content' => '谢谢支持')
		);

		$em = $this->getDoctrine()->getManager();
		$dm = $this->get('doctrine_mongodb')->getManager();
		foreach($cate_arr as $key => $value) {
			$category = $em->getRepository('AcmeBlogBundle:Category')->findOneByTname($value['tname']);
			if ($category) {
				$category->setName($value['name']);
			}else{
				$category = new Category();
				$category->setName($value['name']);
				$category->setTname($value['tname']);
				$em->persist($category);
			}
			$em->flush();
		}

		$category_php = $this->getDoctrine()->getRepository('AcmeBlogBundle:Category')->findOneByTname('php');
		foreach($article_arr as $key => $value) {
			$article = $em->getRepository('AcmeBlogBundle:Article')->findOneByTitle($value['title']);
			if ($article) {
				$article->setContent($value['content']);
				$article->setCategory($category_php);
			}else {
				$article = new Article();
				$article->setTitle($value['title']);
				$article->setContent($value['content']);
				$article->setCategory($category_php);
				$em->persist($article);
			}
			$em->flush();
		}

		$articles = $this->getDoctrine()->getRepository('AcmeBlogBundle:Article')->findAll();
		$one_article = $articles[0];
		foreach($comment_arr as $key => $value) {
			$mongocomment = new MongoComment();
			$mongocomment->setContent($value['content']);
			$dm->persist($mongocomment);
			$dm->flush();

			$comment = new Comment();
			$comment->setComment($mongocomment);
			$comment->setArticle($one_article);
			$em->persist($comment);
			$em->flush();
		}

		return new Response('insert data success');
	}
}
