<?php

namespace Acme\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="commentId", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $commentId;

    /**
     * @var \Acme\BlogBundle\Entity\Article
     *
     * @ORM\ManyToOne(targetEntity="Acme\BlogBundle\Entity\Article", inversedBy="comments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="article_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $article;


}
