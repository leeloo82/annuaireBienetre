<?php

namespace App\Controller;

use App\Entity\CategorieServices;
use App\Form\CategorieServicesType;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="app_categorie")
     */
    public function formCategorie(EntityManagerInterface $entityManager,Request $request): Response
    {
        $categorie = new CategorieServices();

        //creation du formulaire
        $formCategorie = $this->createForm(CategorieServicesType::class,$categorie);

        $formCategorie->handleRequest($request);
        if($formCategorie->isSubmitted()&&$formCategorie->isValid()){
            $categorie = $formCategorie->getData();

            //envoie du formulaire
            $entityManager->persist($categorie);
            $entityManager->flush();

            //redirection vers une vue
            return $this->redirectToRoute('app_home');
        }
        //creation de la vue
        return $this->render ('categorie/add.html.twig',[
            'formCategorie'=>$formCategorie->createView()
        ]);
    }


}
