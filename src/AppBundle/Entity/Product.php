<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="nombre", type="string", length=255, unique=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripticion", type="string", length=255)
     */
    private $descripticion;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", precision=6, scale=2)
     */
    private $precio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAT", type="datetime")
     */
    private $createAT;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime")
     */
    private $updateAt;

    public function __construct()
    {
        $this->createAT = new \DateTime();
        $this->updateAt = $this->createAT;
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Product
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

    /**
     * Set descripticion
     *
     * @param string $descripticion
     *
     * @return Product
     */
    public function setDescripticion($descripticion)
    {
        $this->descripticion = $descripticion;

        return $this;
    }

    /**
     * Get descripticion
     *
     * @return string
     */
    public function getDescripticion()
    {
        return $this->descripticion;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Product
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set createAT
     *
     * @param \DateTime $createAT
     *
     * @return Product
     */
    public function setCreateAT($createAT)
    {
        $this->createAT = $createAT;

        return $this;
    }

    /**
     * Get createAT
     *
     * @return \DateTime
     */
    public function getCreateAT()
    {
        return $this->createAT;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Product
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    public function __toString()
    {
        return $this->getNombre();
        // TODO: Implement __toString() method.
    }
}
