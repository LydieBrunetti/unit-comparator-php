<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Repository\UnitRepository;
use App\Service\UnitService;

class WebController extends AbstractController
{
    /**
     * @Route("/web/convert", name="convert")
     */
    public function index(Request $request, UnitService $unitService)
    {
        $reponse = 0;
        $defaultData = ['valueToConvert' => 'Entrez une valeur'];
        $form = $this->createFormBuilder($defaultData)
        ->add('valueToConvert', TextType::class, ['label'  => 'Valeur à convertir'])
        ->add('inUnit', TextType::class, ['label'  => 'Unité de départ'])
        ->add('outUnit', TextType::class, ['label'  => 'Unité d\'arrivée'])
        ->add('Envoyer', SubmitType::class)
        ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
         
        $data = $form->getData();
        $reponse = $unitService->convert($data);
    
        return $this->render('convert.html.twig', ['form' => $form->createView(),
        'reponse' => $reponse]);
    }
        return $this->render('convert.html.twig', ['form' => $form->createView(), 
        'reponse' => $reponse]);

    }

    /**
     * @Route("/web/list", name="list")
     */
    public function list(UnitRepository $unitRepository, UnitService $unitService)
    {
        $units = $unitService->displayUnits($unitRepository);
        

        return $this->render('unitList.html.twig', ['units' => $units]);
    }

}
