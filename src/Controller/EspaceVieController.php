<?php

namespace App\Controller;

use App\Entity\EspaceVie;
use App\Form\EspaceVieFormType;
use App\Repository\EspaceVieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EspaceVieController extends AbstractController
{
    #[Route('/espacevie', name: 'espace')]
    public function index(EspaceVieRepository $espacevieRepo): Response
    {
        $allEspaceVie=$espacevieRepo->findAll();
        return $this->render('espace_vie/index.html.twig', [
            'controller_name' => 'EspaceVieController',
            'allEspaceVie'=>$allEspaceVie,
        ]);
    }

    
    #[Route('/espacevie/modify/{id}', name:'espace_modifier')]
    #[Route('/espacevie/create', name:'espace_create')]
    public function showEspaceModif(EspaceVie $espaceVie=null,Request $req,EntityManagerInterface $em){
        if(!$espaceVie){
            $espaceVie= new EspaceVie();
        }
        $form=$this->createForm(EspaceVieFormType::class,$espaceVie);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $em->persist($espaceVie);
            $em->flush();

            return $this->redirectToRoute('espace');
        }
    
        return $this->render('espace_vie/espaceModif.html.twig',[
            'formEspace'=>$form->createView(),
            'mode'=>$espaceVie->getId()!=null,
        ]);
    }
}
