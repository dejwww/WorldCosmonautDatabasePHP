<?php
/**
 * Created by PhpStorm.
 * User: dejw
 * Date: 28/08/2019
 * Time: 22:43
 */

namespace App\Controller;

use App\Entity\Superpower;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Main
{
    /**
 * @Rest\Route(path="/")
 */
    public function index(){
/*
        return $this->render(
            'base.html.twig',
           ["superpowers" => $this->getDoctrine()->getRepository(Superpower::class)->findAll()]);
    */}
}