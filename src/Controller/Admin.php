<?php

namespace App\Controller;


use App\Entity\Cosmonaut;
use App\Entity\Superpower;
use App\Form\EditOrNewCosmonautFormType;
use App\Utils\Api\AdminControllerUtils;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Admin extends AbstractController
{


/**
     * @Route(path="/", name="index")
     * @return Response
     */
    public function index(){

        return $this->render(
            'base.html.twig',
            ["cosmonauts" => $this->getDoctrine()->getRepository(Cosmonaut::class)->findAll()]);
    }

    /**
     * @Route("/addOrEdit",name="add_edit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editOrNew(Request $request)
    {  $id = $request->get("cosmonaut");
        if ($id == 0) {
            $cosmonaut = new  Cosmonaut();
        } else {
            $cosmonaut = $this->getDoctrine()->getRepository(Cosmonaut::class)
                ->find($id);
        }

        $superpowers = $this->getDoctrine()->getRepository(Superpower::class)->findAll();
        $cosmonautForm = $this->createForm(EditOrNewCosmonautFormType::class, $cosmonaut, ["data" => $superpowers]);
        $cosmonautForm->handleRequest($request);
        $editOrNewForm = $cosmonautForm->createView();

        if ($cosmonautForm->isSubmitted() && $cosmonautForm->isValid()){
            $this->addFlash('success', 'Database successfully updated');
            $cosmonaut =(new AdminControllerUtils())->newCosmonautUtil($cosmonautForm, $cosmonaut
                )->getData();
        $this->getDoctrine()->getManager()->persist($cosmonaut);
        $this->getDoctrine()->getManager()->flush();
        }
        return $this->render("editOrNew.html.twig",
            ["editOrNewForm" =>$editOrNewForm]);
    }

    /**
     * @Route("/deleteCosmomaut",name="delete_cosmonaut")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteCosmonaut(Request $request, EntityManagerInterface $entityManager){
        $id = $request->get("cosmonaut");
        $cosmonaut = $this->getDoctrine()->getRepository(Cosmonaut::class)
            ->find($id);
        (new AdminControllerUtils())->deleteCosmonautUtil($cosmonaut, $entityManager);
        return $this->render(
            'base.html.twig',
            ["cosmonauts" => $this->getDoctrine()->getRepository(Cosmonaut::class)->findAll()]);

    }
    public function __construct()
    {
    }
}