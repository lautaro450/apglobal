<?php

namespace AprendizajeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RespuestaConversacion
 *
 * @ORM\Table(name="respuesta_conversacion")
 * @ORM\Entity(repositoryClass="AprendizajeBundle\Repository\RespuestaConversacionRepository")
 */
class RespuestaConversacion
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
     * @ORM\Column(name="respuesta", type="text")
     */
    private $respuesta;

    /**
     * @var int
     *
     * @ORM\Column(name="usuarioID", type="integer")
     */
    private $usuarioID;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime")
     */
    private $time;

    /**
     * @var int
     *
     * @ORM\Column(name="conversacionID", type="integer")
     */
    private $conversacionID;


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
     * Set respuesta
     *
     * @param string $respuesta
     *
     * @return RespuestaConversacion
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Get respuesta
     *
     * @return string
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * Set usuarioID
     *
     * @param integer $usuarioID
     *
     * @return RespuestaConversacion
     */
    public function setUsuarioID($usuarioID)
    {
        $this->usuarioID = $usuarioID;

        return $this;
    }

    /**
     * Get usuarioID
     *
     * @return int
     */
    public function getUsuarioID()
    {
        return $this->usuarioID;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return RespuestaConversacion
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

    /**
     * Set conversacionID
     *
     * @param integer $conversacionID
     *
     * @return RespuestaConversacion
     */
    public function setConversacionID($conversacionID)
    {
        $this->conversacionID = $conversacionID;

        return $this;
    }

    /**
     * Get conversacionID
     *
     * @return int
     */
    public function getConversacionID()
    {
        return $this->conversacionID;
    }
}

