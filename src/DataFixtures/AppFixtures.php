<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Ville;
use App\Entity\Proprietaire;
use App\Entity\Restaurant;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $villeNumber = rand(4, 8);
        for ($i = 0; $i <= $villeNumber; $i++) {
            $restoNumber = rand(5, 9);

            $ville = new Ville();
            $ville->setNom($faker->city);
            $manager->persist($ville);

            for ($j = 0; $j < $restoNumber; $j++) {

                $restaurant = new Restaurant();
                $restaurant->setName($faker->company);
                $restaurant->setAddress($faker->address);
                $restaurant->setImage($faker->imageUrl(380,380));
                $restaurant->setVille($ville);


                $chef = new Proprietaire();
                $chef->setLastName($faker->lastName);
                $chef->setFirstName($faker->firstName);
                $chef->setBrithdate($faker->dateTimeThisCentury);

                $restaurant->setProprietaire($chef);

                $manager->persist($restaurant);
                $manager->persist($chef);
            }
        }

        $manager->flush();
    }
}
