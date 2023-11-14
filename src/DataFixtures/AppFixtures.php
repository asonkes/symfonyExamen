<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = FakerFactory::create('fr_FR');

        for ($i = 1; $i <= 18; $i++) {
            $ad = new Ad();
            $ad
                ->setMarque($faker->randomElement(['Ford', 'Peugeot', 'Kia', 'Volkswagen', 'Hyundai', 'Dacia', 'Fiat', 'Renault', 'Opel']))
                ->setModele($faker->word)
                ->setCover($faker->randomElement([
                    'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures/c7f95e1c-ba59-4525-8ba4-adc0b0febfff.jpg?itok=soQZHu6u',
                    'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/24857/outside_360/12.jpg?itok=UxP1EcxY',
                    'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures/aab7e372-407b-4fd7-821b-3889845ce8c1.jpg?itok=LCSqO825',
                    'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures/b9fadf9e-2aa8-4cba-8be8-ed11253c9961.jpg?itok=YiJoskp3',
                    'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures/b028138c-be48-4f3f-9f10-d0accf69e838.jpg?itok=m_wxN-w3',
                    'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/26979/outside_360/12.jpg?itok=JTUnF59X'
                ]))
                ->setKm($faker->numberBetween(50000, 100000))
                ->setPrix($faker->numberBetween(8000, 12000))
                ->setNbproprio($faker->numberBetween(1, 2))
                ->setCylindree($faker->numberBetween(900, 1000))
                ->setPuissance($faker->numberBetween(60, 126))
                ->setCarburant($faker->randomElement(['Essence', 'Diesel']))
                ->setTransmission($faker->randomElement(['Manuelle', 'Automatique']))
                ->setDescription($faker->sentence)
                ->setTexte($faker->sentence)
                ->setCirc($faker->numberBetween(2017, 2020));

            $manager->persist($ad);
        }

        $manager->flush();
    }
}
