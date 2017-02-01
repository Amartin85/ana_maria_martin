<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"email"}, message="This email is taken")
 * @UniqueEntity(fields={"username"}, message="This username is taken")
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
     *
     * @var string
     *
     *
     * @ORM\Column(name="nombre", type="string", length=255, unique=true)
     *
     */
    private $nombre;

    /**
     * @var string
     *
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", precision=7, scale=2)
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
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * Set descripicion
     *
     * @param string $descripicion
     *
     * @return Product
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
