<?php

namespace App\Controller;

use App\Entity\Contacto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactoController extends AbstractController
{
    /**
     * @Route("/contacto/inicio")
     */
    public function index(): Response
    {
        return $this->render('contacto/index.html.twig', [
            'controller_name' => 'ContactoController',
        ]); 
    }
}
