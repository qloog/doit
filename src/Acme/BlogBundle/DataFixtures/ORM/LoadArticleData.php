<?php
/**
 * Description ......
 *
 * @Author: qloog
 * @Date: 14-10-7 16:35
 */
namespace Acme\BlogBundle\DataFixture\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
USE Acme\BlogBundle\Entity\Article;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager)
	{
		$data = array(
			array('title' => 'PHP基础', 'content' => 'echo var_dump'),
			array('title' => 'PHP函数', 'content' => '$a = function(){}'),
			array('title' => 'PHP-OOP', 'content' => '面向对象'),
		);
		$this->insertData($data, $manager);
	}

	public function insertData($data, ObjectManager $manager)
	{
		foreach ($data as $key => $value) {
			$article = new Article();
			$article->setTitle($value['title']);
			$article->setContent($value['content']);
			$article->setCategory($this->getReference('category'));
			$manager->persist($article);
			$manager->flush();
			if ($key == 0) {
				$this->addReference('article', $article);
			}
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getOrder()
	{
		return 2; // the order in which fixtures will be loaded
	}

}