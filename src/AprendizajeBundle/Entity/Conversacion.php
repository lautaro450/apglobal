<?php

namespace AprendizajeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversacion
 *
 * @ORM\Table(name="conversacion")
 * @ORM\Entity(repositoryClass="AprendizajeBundle\Repository\ConversacionRepository")
 */
class Conversacion
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
     * @var int
     *
     * @ORM\Column(name="user_one", type="integer")
     */
    private $userOne;

    /**
     * @var int
     *
     * @ORM\Column(name="user_two", type="integer")
     */
    private $userTwo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime")
     */
    private $time;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userOne
     *
     * @param integer $userOne
     *
     * @return Conversacion
     */
    public function setUserOne($userOne)
    {
        $this->userOne = $userOne;

        return $this;
    }

    /**
     * Get userOne
     *
     * @return int
     */
    public function getUserOne()
    {
        return $this->userOne;
    }

    /**
     * Set userTwo
     *
     * @param integer $userTwo
     *
     * @return Conversacion
     */
    public function setUserTwo($userTwo)
    {
        $this->userTwo = $userTwo;

        return $this;
    }

    /**
     * Get userTwo
     *
     * @return int
     */
    public function getUserTwo()
    {
        return $this->userTwo;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Conversacion
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }
}

