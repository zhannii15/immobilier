<?php

namespace App\Controller;

use App\Entity\SurfacePiece;
use App\Form\SurfacePieceFormType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\SurfacePieceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SurfacePieceController extends AbstractController
{
    #[Route('/surfacepiece', name: 'surfacepiece')]
    public function index(SurfacePieceRepository $surfaceRepo): Response
    {
        $allSurface=$surfaceRepo->findAll();
        return $this->render('surface_piece/index.html.twig', [
            'controller_name' => 'SurfacePieceController',
            'allSurface'=>$allSurface,
        ]);
    }

    #[Route('/surfacepiece/modify/{id}', name:'surface_modifier')]
    #[Route('/surfacepiece/create', name:'surface_create')]
    public function showSurfaceModif(SurfacePiece $surfacePiece=null,Request $req,EntityManagerInterface $em){
        if(!$surfacePiece){
            $surfacePiece= new SurfacePiece();
        }
        $form=$this->createForm(SurfacePieceFormType::class,$surfacePiece);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $em->persist($surfacePiece);
            $em->flush();

            return $this->redirectToRoute('surfacepiece');
        }
    
        return $this->render('surface_piece/surfaceModif.html.twig',[
            'formSurface'=>$form->createView(),
            'mode'=>$surfacePiece->getId()!=null,
        ]);
    }
}
