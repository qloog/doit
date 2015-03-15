<?php

namespace Doit\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="username_UNIQUE", columns={"username"}),
 *         @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="Doit\WebBundle\Repository\UserRepository")
 */
class User extends  BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
