<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Service\Slug;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $slug = new Slug();
        for ($i = 0; $i < 30; $i++) {
            $category = new Category();
            $category->setName($faker->lastName . ' ' . $faker->firstName);
            $category->setSlug($slug->slugify($category->getName()));
            $manager->persist($category);
        }

        $manager->flush();
    }
}
