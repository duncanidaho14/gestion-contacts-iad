<?php

namespace App\DataFixtures;

use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct()
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();


        $manager->flush();
    }
}
