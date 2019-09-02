<?php
/**
 * Created by PhpStorm.
 * User: dejw
 * Date: 28/08/2019
 * Time: 21:53
 */

namespace App\Utils\Api;


use App\Entity\Cosmonaut;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;

class AdminControllerUtils extends AbstractFOSRestController
{
    public function __construct()
    {

    }

    public function newCosmonautUtil($data, Cosmonaut $cosmonaut)
    {
        $cosmonaut->setFirstName($data->get('firstName')->getData());
        $cosmonaut->setSurname($data->get('surname')->getData());
        $cosmonaut->setSuperpower($data->get('superpower')->getData());
        $cosmonaut->setDateOfBirth($data->get('dateOfBirth')->getData());

        return $this->view($cosmonaut,200);
    }

    public function deleteCosmonautUtil($cosmonaut, EntityManagerInterface $entityManager){

        if($cosmonaut){
            $entityManager->remove($cosmonaut);
            $entityManager->flush();
            return new Response("Cosmonaut deleted",200);
        }
        else
            return new Response("Wrong id!",404);
    }




}