<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $book = new Book();
        $book->setTitle('The Old Man And The Sea');
        $book->setAuthor('Ernest Hemingway');
        $book->setPagecount(127);
        $book->setStatus('Completed');
        $book->setDescription('The Old Man and the Sea is the story of an epic struggle between an old, seasoned fisherman and the greatest catch of his life. For eighty-four days, Santiago, an aged Cuban fisherman, has set out to sea and returned empty-handed.');
        $book->setImage("https://upload.wikimedia.org/wikipedia/en/7/73/Oldmansea.jpg");
        $manager->persist($book);

        $book2 = new Book();
        $book2->setTitle('Beyond Good and Evil');
        $book2->setAuthor('Friedrich Nietzsche');
        $book2->setPagecount(218);
        $book2->setStatus('Plan to Read');
        $book2->setDescription('In a nutshell, in Beyond Good And Evil Nietzsche argues that: a) Concepts of good and evil ("morality") are culturally constructed rather than inherently "true"; different cultures develop different moral laws in order maintain social order.');
        $book2->setImage("https://media.s-bol.com/N8Y0Ng0o0kpv/545x840.jpg");
        $manager->persist($book2);

        $book3 = new Book();
        $book3->setTitle('One Day in the Life of Ivan Denisovich');
        $book3->setAuthor('Aleksandr Solzhenitsyn');
        $book3->setPagecount(153);
        $book3->setStatus('Reading');
        $book3->setDescription('n the madness of World War II, a dutiful Russian soldier is wrongfully convicted of treason and sentenced to ten years in a Siberian labor camp. So begins this masterpiece of modern Russian fiction, a harrowing account of a man who has conceded to all things evil with dignity and strength.
        First published in 1962, One Day in the Life of Ivan Denisovich is considered one of the most significant works ever to emerge from Soviet Russia. Illuminating a dark chapter in Russian history, it is at once a graphic picture of work camp life and a moving tribute to man’s will to prevail over relentless dehumanization.');
        $book3->setImage("https://upload.wikimedia.org/wikipedia/en/f/f7/One_Day_in_the_Life_of_Ivan_Denisovich_cover.jpg");
        $manager->persist($book3);

        $book4 = new Book();
        $book4->setTitle('Crime and Punishment');
        $book4->setAuthor('	Fyodor Dostoevsky');
        $book4->setPagecount(492);
        $book4->setStatus('Plan to Read');
        $book4->setDescription('Crime and Punishment follows the mental anguish and moral dilemmas of Rodion Raskolnikov, an impoverished ex-student in Saint Petersburg who plans to kill an unscrupulous pawnbroker, an old woman who stores money and valuable objects in her flat.');
        $book4->setImage("https://upload.wikimedia.org/wikipedia/en/4/4b/Crimeandpunishmentcover.png");
        $manager->persist($book4);

        $manager->flush();
    }
}
