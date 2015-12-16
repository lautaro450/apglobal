<?php

namespace AprendizajeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="AprendizajeBundle\Repository\VideoRepository")
 */
class Video
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
     * @ORM\Column(name="titulo", type="string", length=100)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="categoria", type="integer")
     */
    private $categoria;
    /**
     * @var int
     *
     * @ORM\Column(name="subCategoria", type="integer")
     */
    private $subCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=100)
     */
    private $link;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;
    /**
     * @var int
     *
     * @ORM\Column(name="usuarioID", type="integer")
     */
    private $usuarioID;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Video
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }
    /**
     * Set usuarioID
     *
     * @param int $usuarioID
     *
     * @return Video
     */
    public function setUsuarioID($usuarioID)
    {
        $this->usuarioID = $usuarioID;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }
    /**
     * Set categoria
     *
     * @param integer $categoria
     *
     * @return Video
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return int
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    /**
     * Set subCategoria
     *
     * @param int $subCategoria
     *
     * @return Video
     */
    public function setSubCategoria($subCategoria)
    {
        $this->subCategoria = $subCategoria;

        return $this;
    }

    /**
     * Get subCategoria
     *
     * @return int
     */
    public function getSubCategoria()
    {
        return $this->subCategoria;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Video
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }


    /**
     * Set link
     *
     * @param string $link
     *
     * @return Video
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Video
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function geFecha()
    {
        return $this->fecha;
    }

}

