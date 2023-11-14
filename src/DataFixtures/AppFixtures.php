<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use App\Entity\Image;
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


            for ($j = 1; $j <= 5; $j++) {
                $image = new Image();
                $image
                    ->setName(implode(' ', [$ad->getMarque()]))
                    ->setUrl($faker->randomElement([
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures/39d292de-7343-4e67-bd3b-a7dc0f7f6e89.jpg?itok=sAUdSuZN',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures/696521da-3ba1-4983-b0b3-c653c7e769f3.jpg?itok=cjdFOaqL',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures/84d6844c-ada8-4070-b669-950daad7f49e.jpg?itok=vB4WyRJP',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/25461/outside_360/11.jpg?itok=cujvOd7c',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/25461/outside_360/10.jpg?itok=b7CpjUJ6',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/25461/outside_360/8.jpg?itok=LFC--deq',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/24857/outside_360/10.jpg?itok=A4OBIzcS',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/24857/outside_360/3.jpg?itok=DNDfmQqS',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/24857/details/WDGJO6zldTqH2aRh99obtRSBoJo1m2y8rYHzt8fl.jpg?itok=3NDJTF3i',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/24857/details/7DxZuFQKnxY5ZC3icKU9ei5dzV7yNRZhpJm4yzsr.jpg?itok=MPEVj87S',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/27063/outside_360/9.jpg?itok=82kBMVEL',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/27063/outside_360/5.jpg?itok=997zoCb2',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures-carlab/27063/outside_360/1.jpg?itok=9QxLkpec',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures/638cc608-3a55-45eb-9938-0d2a9795ee2d.jpg?itok=tnQJEDII',
                        'https://soco.be/sites/default/files/styles/gallery_big/public/images/cars-pictures/2709b302-f774-45e2-b55d-9e7341e09d71.jpg?itok=XSITgy-Z'
                    ]))
                    ->setVoitureId($ad);
                $manager->persist($image);
            }
        }

        $manager->flush();
    }
}
