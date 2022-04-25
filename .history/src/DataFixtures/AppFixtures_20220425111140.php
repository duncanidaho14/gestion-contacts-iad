<?php

namespace App\DataFixtures;

use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Contact;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i=0; $i < 20; $i++) { 
            $contact = new Contact();


        $contact->setNom($faker->lastName())
                ->setPrenom($faker->firstName())
                ->setEmail($faker->email())
                ->setAdresse($faker->address())
                ->setTelephone($faker->phoneNumber())
                ->setAge($faker->numberBetween(15, 99))
        ;
        $manager->persist($contact);
        }
        
        $manager->flush();
    }
}
