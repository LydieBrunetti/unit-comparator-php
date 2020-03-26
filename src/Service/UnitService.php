<?php

namespace App\Service;

use App\JSONToReturn;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UnitRepository;

class UnitService
{

    public function displayUnits(UnitRepository $unitRepository)
    {
        $uniteList = $unitRepository->findAll();
        return $uniteList;
    }


    public function convert(Array $content)
    {
        $valueToConvert = $content['valueToConvert'];
        $inUnit = $content['inUnit'];
        $outUnit = $content['outUnit'];

        if (!isset($content)) {
            return $toReturn = 'Pas de contenu';
        }

        if (!isset($valueToConvert) || !is_numeric($valueToConvert) || $valueToConvert < 0) {
            return $toReturn = 'La valeur à convertir est incorrecte';
        }

        if (!isset($inUnit) || !isset($outUnit)) {
            return $toReturn = 'L\'unité de départ et/ou d\'arrivée est incorrecte';
        }

        if ($inUnit == 'm2' && $outUnit == 'ha') {
            return $toReturn = m2toHectare($valueToConvert);
        }

        if ($inUnit == 'kW' && $outUnit == 'kg CO2') {   
            return $toReturn = kwToCo2($valueToConvert);
        }

        if ($inUnit == 'kg CO2' && $outUnit == 'kW') {
            return $toReturn = co2ToKw($valueToConvert);
        }

        if ($inUnit == 'ha' && $outUnit == 'm2') {
            return $toReturn = hectareToM2($valueToConvert);
        } 
    
    }
}