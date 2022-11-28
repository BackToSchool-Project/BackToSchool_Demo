<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    protected $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');

        $userTest = new User();
        $passwordHash = $this->hasher->hashPassword($userTest, "password");
        $userTest
            ->setLastName('Doe')
            ->setFirstName('John')
            ->setEmail('john.doe@gmail.com')
            ->setPassword($passwordHash)
            ->setCity('Marseille')
            ->setPosteCode(13001);

        $manager->persist($userTest);

        for ($u = 0 ; $u < 50; $u++) {

            $user = new User();
            $passwordHash = $this->hasher->hashPassword($user ,$faker->password());
            $user
                ->setFirstName($faker->firstName())
                ->setLastName($faker->lastName())
                ->setEmail($faker->email())
                ->setPassword($passwordHash)
                ->setCity('Marseille')
                ->setPosteCode(13001);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
