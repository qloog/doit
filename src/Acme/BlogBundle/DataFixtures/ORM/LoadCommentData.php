<?php
/**
 * Description ......
 *
 * @Author: qloog
 * @Date: 14-10-7 16:52
 */
namespace Acme\BlogBundle\DataFixture\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
USE Acme\BlogBundle\Entity\Comment;

class LoadCommentData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{

	/**
	 * @var ContainerInterface
	 */
	private $container;

	/**
	 * {@inheritDoc}
	 */
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}

	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager)
	{
		$data = $this->container->get('doctrine_mongodb')->getManager()
			->getRepository('AcmeBlogBundle:Comment')->findAll();

		$this->insertData($data, $manager);
	}

	public function insertData($data, ObjectManager $manager)
	{
		foreach($data as $key => $value) {
			$comment = new Comment();
			$comment->setArticle($this->getReference('article'));
			$comment->setComment($value);
			$manager->persist($comment);
			$manager->flush();
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getOrder()
	{
		return 3; // the order in which fixtures will be loaded
	}


}