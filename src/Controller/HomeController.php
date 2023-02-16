<?php

namespace App\Controller;

use App\Entity\CategorieServices;
use App\Form\CategorieServicesType;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function DisplayCategorie(EntityManagerInterface $entityManager): Response
    {
        //creation variable reception objet
        $repository = $entityManager->getRepository(CategorieServices::class);

        $categorie = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'list'=>$categorie,
        ]);
    }

}
