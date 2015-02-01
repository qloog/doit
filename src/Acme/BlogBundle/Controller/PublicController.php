<?php
/**
 * Description ......
 * 
 * @Author: qloog
 * @Date: 14-10-5 10:32
 */

namespace Acme\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PublicController extends Controller
{
	public function sidebarAction() {
		$category = $this->getDoctrine()->getRepository('AcmeBlogBundle:Category')->findAll();
		$data = array('categories' => $category);
		return $this->render('AcmeBlogBundle:Public:sidebar.html.twig', $data);
	}
}