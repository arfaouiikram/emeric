<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Puissance
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PuissanceRepository")
 */

class Puissance
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cylindree", inversedBy="Puissance"))
     * @ORM\JoinColumn(name="Cylindreeid", referencedColumnName="id" , nullable=true)
     */
    private $Cylindreeid;

    private $file;

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
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
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

   
  



}
