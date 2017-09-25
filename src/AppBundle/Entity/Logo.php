<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Logo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\LogoRepository")
 */

class Logo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="designation", type="string" , length=255 , nullable=true)
     */
    private $designation;
    
    /**
 * @var string
 *
 * @ORM\Column(name="src", type="string", nullable=true)
 */
    private $src;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Produit", inversedBy="Accessoire"))
     * @ORM\JoinColumn(name="Produitid", referencedColumnName="id" , nullable=true)
     */
    private $Produitid;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    /**
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * @param string $src
     */
    public function setSrc($src)
    {
        $this->src = $src;
    }



    /**
     * @return mixed
     */
    public function getProduitid()
    {
        return $this->Produitid;
    }

    /**
     * @param mixed $Produitid
     */
    public function setProduitid($Produitid)
    {
        $this->Produitid = $Produitid;
    }

   

  



}
