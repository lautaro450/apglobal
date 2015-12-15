<?php

namespace AprendizajeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioVideo
 *
 * @ORM\Table(name="usuario_video")
 * @ORM\Entity(repositoryClass="AprendizajeBundle\Repository\UsuarioVideoRepository")
 */
class UsuarioVideo
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
     * @ORM\Column(name="id_usuario", type="integer")
     */
    private $idUsuario;

    /**
     * @var int
     *
     * @ORM\Column(name="id_video", type="integer")
     */
    private $idVideo;


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
     * Set idUsuario
     *
     * @param integer $idUsuario
     *
     * @return UsuarioVideo
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return int
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idVideo
     *
     * @param integer $idVideo
     *
     * @return UsuarioVideo
     */
    public function setIdVideo($idVideo)
    {
        $this->idVideo = $idVideo;

        return $this;
    }

    /**
     * Get idVideo
     *
     * @return int
     */
    public function getIdVideo()
    {
        return $this->idVideo;
    }
}
