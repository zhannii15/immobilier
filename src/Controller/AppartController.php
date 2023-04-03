<?php

namespace App\Controller;

use App\Repository\PictureRepository;
use App\Repository\AppartementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppartController extends AbstractController
{
    #[Route('/appart', name: 'appartement')]
    public function index(AppartementRepository $appartRepo, PictureRepository $pictureRepo): Response
    {
        $apparts=$appartRepo->findAll();
        $picture =$pictureRepo->findAll();
        
        return $this->render('appart/index.html.twig', [
            'controller_name' => 'AppartController',

            'appartement'=>$apparts,
            'picture'=>$picture,
        ]);
    }
}
