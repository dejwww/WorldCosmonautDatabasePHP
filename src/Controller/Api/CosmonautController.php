<?php
/**
 * Created by PhpStorm.
 * User: dejw
 * Date: 28/08/2019
 * Time: 21:52
 */

namespace App\Controller\Api;

use App\Utils\Api\CosmonautControllerUtil;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(path="/api/cosmonaut")
 */
class CosmonautController extends AbstractFOSRestController
{
    /**@Route(path="/create")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newCosmonaut(Request $request, EntityManagerInterface $entityManager)
    {
        return $this->handleView((new CosmonautControllerUtil($entityManager))
            ->newCosmonautUtil($request));

    }

    public function deleteCosmonaut(Request $request, EntityManagerInterface $entityManager)
    {
        return $this->handleView((new CosmonautControllerUtil($entityManager))
            ->deleteCosmonautUtil($request));
    }
}