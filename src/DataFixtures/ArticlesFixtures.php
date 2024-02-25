<?php

namespace App\DataFixtures;


use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0;$i<50;$i++)
        {
            $article = new Article();
            $article->setTitle($faker->sentence($nbWords = 3, $variableWords = true))
                ->setContent($faker->realText(1800))
                ->setState(mt_rand(0,2) === 1 ? Article::ETATS[0] : Article::ETATS[1]);
                $manager->persist($article);
        }

        $manager->flush();
    }
}
