<?php

namespace Doit\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlbumImage
 *
 * @ORM\Table(name="album_image")
 * @ORM\Entity
 */
class AlbumImage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
