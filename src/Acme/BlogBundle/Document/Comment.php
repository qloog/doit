<?php
/**
 * Description ......
 * 
 * @Author: qloog
 * @Date: 14-10-6 21:20
 */
namespace Acme\BlogBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="comments", repositoryClass="Acme\BlogBundle\Repository\CommentRepository")
 */
class Comment
{
	/**
	 * @MongoDB\Id(strategy="INCREMENT")
	 */
	protected $id;
	/**
	 * @MongoDB\String
	 */
	protected $content;
	


    /**
     * Get id
     *
     * @return int_id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get content
     *
     * @return string $content
     */
    public function getContent()
    {
        return $this->content;
    }
}
