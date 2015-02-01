<?php
/**
 * Description ......
 *
 * @Author: qloog
 * @Date: 14-10-7 16:26
 */
namespace Acme\BlogBundle\DataFixture\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
USE Acme\BlogBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager)
	{
		$data = array(
			array('name' => 'PHP课程', 'tname' => 'php'),
			array('name' => 'rails课程', 'tname' => 'rails'),
			array('name' => 'nodejs课程', 'tname' => 'nodejs'),
			array('name' => 'angularjs课程', 'tname' => 'angularjs'),
			array('name' => 'IOS课程', 'tname' => 'ios'),
			array('name' => 'Andorid课程', 'tname' => 'andorid'),
		);
		$this->insertData($data, $manager);
	}

	public function insertData($data, ObjectManager $manager)
	{
		foreach($data as $key => $value) {
			$category = new Category();
			$category->setName($value['name']);
			$category->setTname($value['tname']);
			$manager->persist($category);
			$manager->flush();
			if ($key == 0) {
				$this->addReference('category', $category);
			}
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