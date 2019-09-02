<?php
/**
 * Created by PhpStorm.
 * User: dejw
 * Date: 28/08/2019
 * Time: 21:44
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="superpower")
 */
class Superpower
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue
     * @ORM\Id
     */
        private $id;
    /**
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
        private $name;


        public function __toString()
        {
            return $this->name . "";
        }

        public function __construct()
        {
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }


}