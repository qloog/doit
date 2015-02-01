<?php
/**
 * Description ......
 * 
 * @Author: qloog
 * @Date: 14-10-5 14:52
 */

namespace Acme\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * @Route("/blog/category")
 */
class CategoryController extends Controller
{
	/**
	 * @Route("/{tname}", name="acme_blog_category_show")
	 */
	public function showAction($tname)
	{
		$category = $this->getDoctrine()->getRepository('AcmeBlogBundle:Category')->findOneByTname($tname);
		return new Response($category->getName() . '-' .$category->getTname());
	}

}
