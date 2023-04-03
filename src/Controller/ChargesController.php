<?php

namespace App\Controller;

use App\Entity\Charges;
use App\Form\ChargeFormType;
use App\Repository\ChargesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChargesController extends AbstractController
{
    #[Route('/charges', name: 'charges')]
    public function index(ChargesRepository $chargesRepo): Response
    {
        $allCharge=$chargesRepo->findAll();
        return $this->render('charges/index.html.twig', [
            'controller_name' => 'ChargesController',
            'allCharge'=>$allCharge,
        ]);
    }

    #[Route('/charges/modify/{id}', name:'charge_modifier')]
    #[Route('/charges/create', name:'charge_create')]
    public function showChargeModif(Charges $charge=null,Request $req,EntityManagerInterface $em){
        if(!$charge){
            $charge= new Charges();
        }
        $form=$this->createForm(ChargeFormType::class,$charge);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $em->persist($charge);
            $em->flush();

            return $this->redirectToRoute('charges');
        }
    
        return $this->render('charges/chargeModif.html.twig',[
            'formCharge'=>$form->createView(),
            'mode'=>$charge->getId()!=null,
        ]);
    }
}
