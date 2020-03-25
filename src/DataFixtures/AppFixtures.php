<?php

namespace App\DataFixtures;

use App\Entity\Source;
use App\Entity\Unit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $sourceM2 = new Source();
        $sourceHectare = new Source();
        $sourceKW = new Source();
        $sourceCo2 = new Source();

        $sourceM2->setUrl('https://fr.wikipedia.org/wiki/M%C3%A8tre_carr%C3%A9');
        $sourceHectare->setUrl('https://fr.wikipedia.org/wiki/Hectare');
        $sourceKW->setUrl('https://www.actu-environnement.com/ae/dictionnaire_environnement/definition/kilowatt_kw.php4');
        $sourceCo2->setUrl('https://fr.wikipedia.org/wiki/%C3%89quivalent_CO2');


        $manager->persist($sourceM2);
        $manager->persist($sourceHectare);
        $manager->persist($sourceKW);
        $manager->persist($sourceCo2);

        $uniteM2 = new Unit();
        $uniteHectare = new Unit();
        $uniteKW = new Unit();
        $uniteCo2 = new Unit();

        $uniteM2->setSymbol('m2');
        $uniteM2->setDefinition('Un carré de 1m x 1m');
        $uniteM2->setSource($sourceM2);

        $uniteHectare->setSymbol('ha');
        $uniteHectare->setDefinition('Un carré de 100m x 100m');
        $uniteHectare->setSource($sourceHectare);

        $uniteKW->setSymbol('kW');
        $uniteKW->setDefinition('Unité de puissance, multiple du watt, et valant 1000 watts');
        $uniteKW->setSource($sourceKW);

        $uniteCo2->setSymbol('kg CO2');
        $uniteCo2->setDefinition('Quantité de gaz à effet de serre');
        $uniteCo2->setSource($sourceCo2);

        $manager->persist($uniteM2);
        $manager->persist($uniteHectare);
        $manager->persist($uniteKW);
        $manager->persist($uniteCo2);

        $manager->flush();
    }
}
