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
     * @Route("/categorieADD", name="app_categorie_add")
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

    /**
     * @Route("/categorie/description/{id}", name="app_description")
     */
    public function descriptionService($id, EntityManagerInterface $entityManager){

        $repository = $entityManager->getRepository(CategorieServices::class);
        $description = $repository->find($id);
        return $this->render('categorie/description.html.twig',[
            'description'=> $description,
        ]);
    }
    /**
     * @Route("/categorie/description/{id}", name="app_categorie")
     */
    public function DisplayCategorie(EntityManagerInterface $entityManager): Response
    {
        //creation variable reception objet
        $repository = $entityManager->getRepository(CategorieServices::class);

        $categorie = $repository->findAll();

        return $this->render('categorie/description.html.twig', [
            'list'=>$categorie,
        ]);
    }


}
