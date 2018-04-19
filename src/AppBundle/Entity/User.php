<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Task[]|\Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Task", mappedBy="users")
     */
    private $tasks;

    /**
     * @var Board[]|\Doctrine\Common\Collections\ArrayCollection
     */
    private $boards;

    /**
     * @return Task[]|\Doctrine\Common\Collections\ArrayCollection
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param Task[]|\Doctrine\Common\Collections\ArrayCollection $tasks
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * @return Board[]|ArrayCollection
     */
    public function getBoards()
    {
        return $this->boards;
    }

    /**
     * @param $board Board
     */
    public function addBoard($board)
    {
        $this->boards[] = $board;
    }

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tasks  = new ArrayCollection();
        $this->boards = new ArrayCollection();
    }
}
