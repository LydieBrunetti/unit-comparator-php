<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UnitRepository;

class WebController extends AbstractController
{
    /**
     * @Route("/web/convert", name="convert")
     */
    public function index(UnitRepository $unitRepository)
    {
        $units= $unitRepository->findAll();

        return $this->render('convert.html.twig', ['units' => $units]);
    }

    /**
     * @Route("/web/list", name="list")
     */
    public function list(UnitRepository $unitRepository)
    {
        $units = $unitRepository->findAll();

        return $this->render('unitList.html.twig', ['units' => $units]);
    }
}
