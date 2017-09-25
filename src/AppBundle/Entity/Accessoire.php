<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Accessoire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AccessoireRepository")
 */

class Accessoire
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
 * @ORM\Column(name="logo", type="string", nullable=true)
 */
    private $logo;

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
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
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
