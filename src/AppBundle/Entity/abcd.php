<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * abcd
 *
 * @ORM\Table(name="abcd")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\abcdRepository")
 */
class abcd
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
     * @ORM\Column(name="aaaa", type="string", length=255)
     */
    private $aaaa;

    /**
     * @var int
     *
     * @ORM\Column(name="bbbb", type="integer")
     */
    private $bbbb;

    /**
     * @var string
     *
     * @ORM\Column(name="cccc", type="string", length=255)
     */
    private $cccc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime")
     */
    private $createAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime")
     */
    private $updateAt;

    public function __construct()
    {
        $this->createAt = new \DateTime();
        $this->updateAt = $this->createAt;
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
     * Set aaaa
     *
     * @param string $aaaa
     *
     * @return abcd
     */
    public function setAaaa($aaaa)
    {
        $this->aaaa = $aaaa;

        return $this;
    }

    /**
     * Get aaaa
     *
     * @return string
     */
    public function getAaaa()
    {
        return $this->aaaa;
    }

    /**
     * Set bbbb
     *
     * @param integer $bbbb
     *
     * @return abcd
     */
    public function setBbbb($bbbb)
    {
        $this->bbbb = $bbbb;

        return $this;
    }

    /**
     * Get bbbb
     *
     * @return int
     */
    public function getBbbb()
    {
        return $this->bbbb;
    }

    /**
     * Set cccc
     *
     * @param string $cccc
     *
     * @return abcd
     */
    public function setCccc($cccc)
    {
        $this->cccc = $cccc;

        return $this;
    }

    /**
     * Get cccc
     *
     * @return string
     */
    public function getCccc()
    {
        return $this->cccc;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return abcd
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return abcd
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

}

