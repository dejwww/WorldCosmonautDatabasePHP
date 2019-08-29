<?php
/**
 * Created by PhpStorm.
 * User: dejw
 * Date: 28/08/2019
 * Time: 21:53
 */

namespace App\Utils\Api;


use App\Entity\Cosmonaut;
use App\Entity\Superpower;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;

class CosmonautControllerUtil extends AbstractFOSRestController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function newCosmonautUtil(Request $request)
    {
        $id = $request->get("cosmonaut");
        if($id==0){
            $cosmonaut = new  Cosmonaut();
        }
        else{
            $cosmonaut = $this->entityManager->getRepository(Cosmonaut::class)
                ->find($id);
        }
        $cosmonaut->setFirstName("David");
        $cosmonaut->setSurname("Kovalcik");
        $cosmonaut->setDateOfBirth(getdate());
        $cosmonaut->addSuperpower($this->entityManager->getRepository(Superpower::class)
            ->find(7));
        $this->entityManager->persist($cosmonaut);
        $this->entityManager->flush();
        return $this->view($cosmonaut,200);
    }

    public function deleteCosmonautUtil(Request $request){

    }
}