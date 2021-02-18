<?php

namespace App\Controller;

use App\Entity\Contacto;
use App\Form\ContactoType;
use App\Repository\ContactoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contacto")
 */
class ContactoController extends AbstractController
{
    /**
     * @Route("/", name="contacto_index", methods={"GET"})
     */
    public function index(ContactoRepository $contactoRepository): Response
    {
        return $this->render('/index.html.twig', [
            'contactos' => $contactoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/list/{type}", name="contacto_list")
     */
    //Filtro para buscar por tipo de agengas o todas
    public function list(Request $request,  $type): Response{
        if($type == 'all'){//En el caso que busquemos todas buscara todas las agenads
            $contacto = $this->getdoctrine()
            ->getRepository(Contacto::class)
            ->findAll();
        }else{//En el caso de buscar algo en espesifico hara una busqueda con el tipo que pasemos por url
            $contacto = $this->getdoctrine()
            ->getRepository(Contacto::class)
            ->findBy(['tipo' => $type]);
        }
        return $this->render('contacto/table.html.twig',[
            'contactos' => $contacto,
            'type' => $type,
        ]);
    }


    /**
     * @Route("/new", name="contacto_new", methods={"GET","POST"})
     */
    //Crear un nuevo contacto con toda la informacion del formulario
    public function new(Request $request): Response
    {
        $contacto = new Contacto();
        $form = $this->createForm(ContactoType::class, $contacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {//Confrima si todo la informacion es validad para crear el contacto

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contacto);
            $entityManager->flush();
            
            return $this->redirectToRoute('contacto_show', ['id' =>$contacto -> getId(),]);
        }

        return $this->render('contacto/new.html.twig', [
            'contacto' => $contacto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contacto_show", methods={"GET"})
     */
    //Muestra la informaciono del contacto
    public function show(Contacto $contacto): Response
    {
        return $this->render('contacto/show.html.twig', [
            'contacto' => $contacto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contacto_edit", methods={"GET","POST"})
     */
    //Atualiza el contacto con la nueva informacion
    public function edit(Request $request, Contacto $contacto): Response
    {
        $form = $this->createForm(ContactoType::class, $contacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {//Confrima si todo la informacion es validad para atualizar el contacto
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contacto_index');
        }

        return $this->render('contacto/edit.html.twig', [
            'contacto' => $contacto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contacto_delete", methods={"DELETE"})
     */
    //Borra el contacto tomando en cuenta su ID
    public function delete(Request $request, Contacto $contacto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contacto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contacto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contacto_index');
    }

    /**
     * @Route("/{id}", name="contacto_delete2", methods={"DELETE"})
     */
    //Borra el contacto tomando en cuenta su ID
    public function delete2(Request $request, Contacto $contacto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contacto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contacto);
            $entityManager->flush();
        }
        return $this->redirectToRoute('contacto_index');
    }
    
}

