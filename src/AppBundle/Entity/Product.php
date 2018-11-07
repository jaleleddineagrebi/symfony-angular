<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


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
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Assert\NotBlank(message="not blak message")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isSold",type="boolean")
     */
     private $isSold = true;


    /**
     * @var categorie
     *
     * @Assert\Valid()
     * @Assert\Type(type="AppBundle\Entity\categorie")
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\categorie",cascade={"persist"})
     */
     private $categorie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

       public function __construct()
       {

           $this->createdAt = new \DateTime('NOW');
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
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set isSold
     *
     * @param boolean $isSold
     *
     * @return Product
     */
    public function setIsSold($isSold)
    {
        $this->isSold = $isSold;

        return $this;
    }

    /**
     * Get isSold
     *
     * @return boolean
     */
    public function getIsSold()
    {
        return $this->isSold;
    }

    /**
     * Set categorie
     *
     * @param \AppBundle\Entity\categorie $categorie
     *
     *
     *
     * @return Product
     */
    public function setCategorie(\AppBundle\Entity\categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \AppBundle\Entity\categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
