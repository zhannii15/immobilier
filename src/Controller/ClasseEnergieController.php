<?php

namespace App\Controller;

use App\Form\EnergieFormType;
use App\Entity\ClasseEnergetique;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ClasseEnergetiqueRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClasseEnergieController extends AbstractController
{
    #[Route('/Energie', name: 'energie')]
    public function index(ClasseEnergetiqueRepository $energieRepo): Response
    {
        $allEnergie=$energieRepo->findAll();
        return $this->render('classe_energie/index.html.twig', [
            'controller_name' => 'ClasseEnergieController',
            'allEnergie'=>$allEnergie,
        ]);
    }
    #[Route('/Energie/modify/{id}', name:'energie_modifier')]
    #[Route('/Energie/create', name:'energie_create')]
    public function showEnergieModif(ClasseEnergetique $energie=null,Request $req,EntityManagerInterface $em){
        if(!$energie){
            $energie= new ClasseEnergetique();
        }
        $form=$this->createForm(EnergieFormType::class,$energie);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $em->persist($energie);
            $em->flush();

            return $this->redirectToRoute('energie');
        }
    
        return $this->render('classe_energie/energieModif.html.twig',[
            'formEnergie'=>$form->createView(),
            'mode'=>$energie->getId()!=null,
        ]);
    }
}
