<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Repository\UnitRepository;
use App\Service\UnitService;
use App\JSONToReturn;

class WebController extends AbstractController
{
    /**
     * @Route("/web/convert", name="convert")
     */
    public function index(UnitRepository $unitRepository, UnitService $unitService)
    {

        $units = $unitService->displayUnits($unitRepository);

        return $this->render('convert.html.twig', ['units' => $units]);

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
