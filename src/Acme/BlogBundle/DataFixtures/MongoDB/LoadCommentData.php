<?php
/**
 * Description ......
 *
 * @Author: qloog
 * @Date: 14-10-7 16:46
 */
namespace Acme\BlogBundle\DataFixture\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
USE Acme\BlogBundle\Document\Comment;

class LoadCommentData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager)
	{
		$data = array(
			array('content' => '非常好的课程'),
			array('content' => '谢谢支持')
		);
		$this->insertData($data, $manager);
	}

	public function insertData($data, ObjectManager $manager)
	{
		foreach ($data as $key => $value) {
			$comment = new Comment();
			$comment->setContent($value['content']);
			$manager->persist($comment);
			$manager->flush();
			$comments[] = $comment;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getOrder()
	{
		return 1; // the order in which fixtures will be loaded
	}
}