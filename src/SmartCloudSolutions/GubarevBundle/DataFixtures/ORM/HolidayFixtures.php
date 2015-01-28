<?php

namespace SmartCloudSolutions\GubarevBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SmartCloudSolutions\GubarevBundle\Entity\Holiday;


class HolidayFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $holiday1 = new Holiday();
        $holiday1->setData(new \DateTime('2015-01-01'));
        $manager->persist($holiday1);

        $holiday1 = new Holiday();
        $holiday1->setData(new \DateTime('2015-01-07'));
        $manager->persist($holiday1);

        $holiday1 = new Holiday();
        $holiday1->setData(new \DateTime('2015-03-08'));
        $manager->persist($holiday1);

        $holiday1 = new Holiday();
        $holiday1->setData(new \DateTime('2015-04-12'));
        $manager->persist($holiday1);

        $holiday1 = new Holiday();
        $holiday1->setData(new \DateTime('2015-05-01'));
        $manager->persist($holiday1);

        $holiday1 = new Holiday();
        $holiday1->setData(new \DateTime('2015-05-02'));
        $manager->persist($holiday1);

        $holiday1 = new Holiday();
        $holiday1->setData(new \DateTime('2015-05-09'));
        $manager->persist($holiday1);

        $holiday1 = new Holiday();
        $holiday1->setData(new \DateTime('2015-05-31'));
        $manager->persist($holiday1);

        $holiday1 = new Holiday();
        $holiday1->setData(new \DateTime('2015-06-28'));
        $manager->persist($holiday1);

        $holiday1 = new Holiday();
        $holiday1->setData(new \DateTime('2015-08-24'));
        $manager->persist($holiday1);

        $manager->flush();
    }

}