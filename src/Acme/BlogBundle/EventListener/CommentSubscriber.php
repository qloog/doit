<?php
/**
 * Description ......
 * 
 * @Author: qloog
 * @Date: 14-10-6 22:21
 */
namespace Acme\BlogBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Acme\BlogBundle\Entity\Comment;

class CommentSubscriber implements  EventSubscriber
{
	protected $dm;

	public function __construct(DocumentManager $dm)
	{
		$this->dm = $dm;
	}

	public function getSubscribedEvents()
	{
		return array(
			'postLoad'
		);
	}

	public function postLoad(LifecycleEventArgs $args)
	{
		$entity = $args->getEntity();
		$em = $args->getEntityManager();
		if ($entity instanceof Comment) {
			$commentRefProp = $em->getClassMetadata('AcmeBlogBundle:Comment')
				->reflClass->getProperty('comment');
			$commentRefProp->setAccessible(true);
			$commentRefProp->setValue(
				$entity, $this->dm->getReference('AcmeBlogBundle:Comment', $entity->getCommentId())
			);
		}
	}
}