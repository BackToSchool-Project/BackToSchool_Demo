<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $userTest = new User();
        $userTest
            ->setLastName('Doe')
            ->setFirstName('John')
            ->setEmail('john.doe@gmail.com')
            ->setPassword('password')
            ->setCity('Marseille')
            ->setPosteCode(13001);

        $manager->persist($userTest);

        for ($u = 0 ; $u < 50; $u++) {

            $user = new User();
            $user
                ->setFirstName($faker->firstName())
                ->setLastName($faker->lastName())
                ->setEmail($faker->email())
                ->setPassword($faker->password())
                ->setCity('Marseille')
                ->setPosteCode(13001);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
