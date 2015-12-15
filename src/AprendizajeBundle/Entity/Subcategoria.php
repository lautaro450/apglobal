<?php

namespace AprendizajeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcategoria
 *
 * @ORM\Table(name="subcategoria")
 * @ORM\Entity(repositoryClass="AprendizajeBundle\Repository\SubcategoriaRepository")
 */
class Subcategoria
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
     * @ORM\Column(name="id_categoria", type="integer")
     */
    private $idCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;


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
     * Set idCategoria
     *
     * @param integer $idCategoria
     *
     * @return Subcategoria
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }

    /**
     * Get idCategoria
     *
     * @return int
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Subcategoria
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}
