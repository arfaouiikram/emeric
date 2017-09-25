<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Produit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProduitRepository")
 */

class Produit
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
     * @ORM\Column(name="ref", type="string", nullable=true)
     */
    private $ref;

    /**
     * @var float
     *
     * @ORM\Column(name="ht", type="float", nullable=true)
     */
    private $ht;

    /**
     * @var float
     *
     * @ORM\Column(name="ttc", type="float", nullable=true)
     */
    private $ttc;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="string", nullable=true)
     */
    private $descriptif;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Puissance", inversedBy="Produit"))
     * @ORM\JoinColumn(name="Puissanceid", referencedColumnName="id" , nullable=true)
     */
    private $Puissanceid;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Marque", inversedBy="Produit"))
     * @ORM\JoinColumn(name="Marqueid", referencedColumnName="id" , nullable=true)
     */
    private $Marqueid;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Modele", inversedBy="Produit"))
     * @ORM\JoinColumn(name="Modeleid", referencedColumnName="id" , nullable=true)
     */
    private $Modeleid;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cylindree", inversedBy="Produit"))
     * @ORM\JoinColumn(name="Cylindreeid", referencedColumnName="id" , nullable=true)
     */
    private $Cylindreeid;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Type_moteur", inversedBy="Produit"))
     * @ORM\JoinColumn(name="Type_moteurid", referencedColumnName="id" , nullable=true)
     */
    private $Type_moteurid;

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
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return float
     */
    public function getHt()
    {
        return $this->ht;
    }

    /**
     * @param float $ht
     */
    public function setHt($ht)
    {
        $this->ht = $ht;
    }

    /**
     * @return float
     */
    public function getTtc()
    {
        return $this->ttc;
    }

    /**
     * @param float $ttc
     */
    public function setTtc($ttc)
    {
        $this->ttc = $ttc;
    }


    /**
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * @param string $descriptif
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;
    }


    /**
     * @return mixed
     */
    public function getMarqueid()
    {
        return $this->Marqueid;
    }

    /**
     * @param mixed $Marqueid
     */
    public function setMarqueid($Marqueid)
    {
        $this->Marqueid = $Marqueid;
    }

    /**
     * @return mixed
     */
    public function getModeleid()
    {
        return $this->Modeleid;
    }

    /**
     * @param mixed $Modeleid
     */
    public function setModeleid($Modeleid)
    {
        $this->Modeleid = $Modeleid;
    }

    /**
     * @return mixed
     */
    public function getCylindreeid()
    {
        return $this->Cylindreeid;
    }

    /**
     * @param mixed $Cylindreeid
     */
    public function setCylindreeid($Cylindreeid)
    {
        $this->Cylindreeid = $Cylindreeid;
    }

    /**
     * @return mixed
     */
    public function getTypeMoteurid()
    {
        return $this->Type_moteurid;
    }

    /**
     * @param mixed $Type_moteurid
     */
    public function setTypeMoteurid($Type_moteurid)
    {
        $this->Type_moteurid = $Type_moteurid;
    }


    /**
     * @return mixed
     */
    public function getPuissanceid()
    {
        return $this->Puissanceid;
    }

    /**
     * @param mixed $Puissanceid
     */
    public function setPuissanceid($Puissanceid)
    {
        $this->Puissanceid = $Puissanceid;
    }





  



}
