<?php


use App\Entity\Cosmonaut;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Main extends AbstractController
{

    /**
     * @Route(path="/", name="main")
     * @return Response
     */
    public function main(){

        return $this->render(
            'base.html.twig',
            ["cosmonauts" => $this->getDoctrine()->getRepository(Cosmonaut::class)->findAll()]);
    }
}