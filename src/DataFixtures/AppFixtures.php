<?php

namespace App\DataFixtures;

use App\Entity\Proprietaire;
use App\Entity\Restaurant;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 3 ; $i++){
            $ville = new Ville();
            $ville -> setName($faker->city);
            $manager->persist($ville);

            for ($j = 0; $j < 5; $j++){
                $restaurant = new Restaurant();
                $restaurant -> setNom($faker->company)
                            ->setVille($ville)
                            ->setAdresse($faker->streetAddress)
                            ->setImage("https://images.assetsdelivery.com/compings_v2/savo/savo1902/savo190200153.jpg");
                $manager->persist($restaurant);

                $proprietaire = new Proprietaire();
                $proprietaire -> setNom($faker->lastName)
                              -> setPrenom($faker->firstName)
                              -> setDateNaissance($faker->date($format = 'Y-m-d', $max = '1995'))
                              ->setRestaurant($restaurant);
                $manager->persist($proprietaire);
            }

            $manager->flush();
        }

        

        
    }
}
