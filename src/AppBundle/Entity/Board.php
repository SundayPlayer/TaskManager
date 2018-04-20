<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Board
 *
 * @ORM\Table(name="board")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BoardRepository")
 */
class Board
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var User[]|\Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="boards")
     */
    private $users;

    /**
     * @var Row[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Row", mappedBy="board")
     */
    private $rows;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Board
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return User[]|\Doctrine\Common\Collections\ArrayCollection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param $users User[]|\Doctrine\Common\Collections\ArrayCollection
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * @return Row[]|\Doctrine\Common\Collections\ArrayCollection
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param Row[]|\Doctrine\Common\Collections\ArrayCollection
     */
    public function setRows($rows)
    {
        dump($rows);
        $this->rows = $rows;
    }

    /**
     * Board constructor.
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->rows = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }
}
