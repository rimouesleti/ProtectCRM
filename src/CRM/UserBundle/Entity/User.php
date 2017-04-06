<?php
// src/CRM/UserBundle/Entity/User.php

namespace CRM\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
     /**
     * @ORM\Column(name="last_name", type="string", nullable = true)
     */
    private $last_name;

    /**
     * @ORM\Column(name="first_name", type="string", nullable = true)
     */
    private $first_name;

    /**
     * @ORM\Column(name="language", type="string", nullable = true, options={"default" = "en"})
     */
    private $language;

    /**
     * @ORM\Column(name="departement", type="string", nullable = true)
     */
    private $departement;
    
      /**
     * @ORM\Column(name="phone", type="string", nullable = true)
     */
    private $phone;

    /**
     * @ORM\Column(name="address", type="string", nullable = true)
     */
    private $address;

     /**
     * @ORM\ManyToMany(targetEntity="\CRM\PagesBundle\Entity\todos", mappedBy="user")
     */
    protected $todos;

    public function __construct()
    {
        parent::__construct();
         $this->todos = new ArrayCollection();

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
     * Set last_name
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return User
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set departement
     *
     * @param string $departement
     * @return User
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return string 
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }


    /**
     * Add todos
     *
     * @param \CRM\PagesBundle\Entity\todos $todos
     * @return User
     */
    public function addTodo(\CRM\PagesBundle\Entity\todos $todos)
    {
        $this->todos[] = $todos;

        return $this;
    }

    /**
     * Remove todos
     *
     * @param \CRM\PagesBundle\Entity\todos $todos
     */
    public function removeTodo(\CRM\PagesBundle\Entity\todos $todos)
    {
        $this->todos->removeElement($todos);
    }

    /**
     * Get todos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTodos()
    {
        return $this->todos;
    }
}
