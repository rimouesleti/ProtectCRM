<?php

namespace CRM\PagesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * entities
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CRM\PagesBundle\Entity\opportunityRepository")
 * @ORM\HasLifecycleCallbacks
 */
class opportunity {

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
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="step", type="string", length=255, nullable = true)
     */
    private $step;

    /**
     * @var string
     *
     * @ORM\Column(name="margin", type="string", length=255, nullable = true)
     */
    private $margin;

    /**
     * @var string
     *
     * @ORM\Column(name="ca", type="string", length=255 , nullable = true)
     */
    private $ca;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable = true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="lost_comment", type="text", nullable = true)
     */
    private $lost_comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="open_date", type="datetime")
     */
    private $open_date;

    /**
     * @var integer
     *
     * @ORM\Column(name="open_day_number", type="integer", nullable = true)
     */
    private $open_day_number;

    /**
     * @ORM\ManyToOne(targetEntity="entities", inversedBy="opportunity")
     * @ORM\JoinColumn(name="entity_id", referencedColumnName="id")
     */
    protected $entity;

    public function __construct() {
        $this->open_date = new \DateTime();
       
//        $datetime1 = new DateTime($this->open_date);
//        $datetime2 = new DateTime();
//        $interval = $datetime1->diff($datetime2);
//        $this->open_day_number =  $interval->days;
    }

    public function __toString() {
        return $this->name;
        ;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return opportunity
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
     * Set statut
     *
     * @param string $statut
     * @return opportunity
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set step
     *
     * @param string $step
     * @return opportunity
     */
    public function setStep($step)
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Get step
     *
     * @return string 
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * Set margin
     *
     * @param string $margin
     * @return opportunity
     */
    public function setMargin($margin)
    {
        $this->margin = $margin;

        return $this;
    }

    /**
     * Get margin
     *
     * @return string 
     */
    public function getMargin()
    {
        return $this->margin;
    }

    /**
     * Set ca
     *
     * @param string $ca
     * @return opportunity
     */
    public function setCa($ca)
    {
        $this->ca = $ca;

        return $this;
    }

    /**
     * Get ca
     *
     * @return string 
     */
    public function getCa()
    {
        return $this->ca;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return opportunity
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set lost_comment
     *
     * @param string $lostComment
     * @return opportunity
     */
    public function setLostComment($lostComment)
    {
        $this->lost_comment = $lostComment;

        return $this;
    }

    /**
     * Get lost_comment
     *
     * @return string 
     */
    public function getLostComment()
    {
        return $this->lost_comment;
    }

    /**
     * Set open_date
     *
     * @param \DateTime $openDate
     * @return opportunity
     */
    public function setOpenDate($openDate)
    {
        $this->open_date = $openDate;

        return $this;
    }

    /**
     * Get open_date
     *
     * @return \DateTime 
     */
    public function getOpenDate()
    {
        return $this->open_date;
    }

    /**
     * Set open_day_number
     *
     * @param integer $openDayNumber
     * @return opportunity
     */
    public function setOpenDayNumber($openDayNumber)
    {
        $this->open_day_number = $openDayNumber;

        return $this;
    }

    /**
     * Get open_day_number
     *
     * @return integer 
     */
    public function getOpenDayNumber()
    {
        return $this->open_day_number;
    }

    /**
     * Set entity
     *
     * @param \CRM\PagesBundle\Entity\entities $entity
     * @return opportunity
     */
    public function setEntity(\CRM\PagesBundle\Entity\entities $entity = null)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Get entity
     *
     * @return \CRM\PagesBundle\Entity\entities 
     */
    public function getEntity()
    {
        return $this->entity;
    }
}
