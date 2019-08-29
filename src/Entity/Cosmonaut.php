<?php
/**
 * Created by PhpStorm.
 * User: dejw
 * Date: 28/08/2019
 * Time: 21:37
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="cosmonaut")
 */
class Cosmonaut
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(name="first_name", type="string", length=25, nullable=false)
     */
    private $firstName;

    /**
     * @ORM\Column(name="surname", type="string", length=25, nullable=false)
     */
    private $surname;

    /**
     * @ORM\Column(name="date_of_birth", type="date", nullable=false)
     */
    private $dateOfBirth;

    /**
     * @ORM\OneToMany(targetEntity="superpower", mappedBy="id")
     */
    private $superpower;

    public function __construct()
    {
        $this->superpower = new  ArrayCollection();
    }


    public function __toString()
    {
        return $this->id . " " . $this->firstName . " " . $this->surname . "\nDate of Birth: " . $this->dateOfBirth
            . "   Superpower: " . $this->superpower;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param mixed $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return mixed
     */
    public function getSuperpower()
    {
        return $this->superpower;
    }

    /**
     * @param mixed $superpower
     */
    public function setSuperpower($superpower): void
    {
        $this->superpower = $superpower;
    }

    public function addSuperpower($superpower){
        $this->superpower[] = $superpower;
    }

    /**Returns sum of cosmonaut's superpower's levels
     * @return int
     */
    public function getAbsolutePowerLevel(){
        $powerLevel = 0;
        foreach ($this->superpower as $power){
            $powerLevel = $power->getStrengthLevel();
        }
        return $powerLevel;
    }
}