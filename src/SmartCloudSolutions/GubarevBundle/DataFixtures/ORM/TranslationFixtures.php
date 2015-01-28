<?php

namespace SmartCloudSolutions\GubarevBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SmartCloudSolutions\GubarevBundle\Entity\Translation;
use SmartCloudSolutions\GubarevBundle\Entity\Text;
use SmartCloudSolutions\GubarevBundle\Entity\Task;
use SmartCloudSolutions\GubarevBundle\Entity\TaxGroup;
use SmartCloudSolutions\GubarevBundle\Entity\TaskGroupValues;

class TranslationFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $text = new Text();
        $text->setText('сдать налоговую декларацию за %period% ­с %day_from% %month_from% %year_from% до %day_to% %month_to% %year_to%');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('здати податкову декларацію за %period% з %day_from% %month_from% %year_from% до %day_to% %month_to% %year_to%');
        $manager->persist($translation);

        $task1 = new Task();
        $task1->setName('Налоговая декларация');
        $task1->setFilterByPeriod(0);
        $task1->setCriticalDayDirection('after_weekend_holiday');
        $task1->setText($text);
        $manager->persist($task1);

        $text = new Text();
        $text->setText('оплатить ЕСВ за %period% ­до %day_to% %month_to% %year_to%');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('оплатити ЄСВ за %period% до %day_to% %month_to% %year_to%');
        $manager->persist($translation);

        $task2 = new Task();
        $task2->setName('Единый соц. взнос');
        $task2->setFilterByPeriod(1);
        $task2->setCriticalDayDirection('before_weekend_holiday');
        $task2->setText($text);
        $manager->persist($task2);

        $text = new Text();
        $text->setText('оплатить ЕН за %period%­ до %day_to% %month_to% %year_to%');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('оплатити ЄП за %period% до %day_to% %month_to% %year_to%');
        $manager->persist($translation);

        $task3 = new Task();
        $task3->setName('Единый налог');
        $task3->setFilterByPeriod(0);
        $task3->setCriticalDayDirection('before_weekend_holiday');
        $task3->setText($text);
        $manager->persist($task3);

        $text = new Text();
        $text->setText('квартал');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('квартал');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('кварталы');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('квартали');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('december');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('декабря');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('грудня');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('january');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('января');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('січня');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('february');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('февраля');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('лютого');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('march');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('марта');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('березня');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('april');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('апреля');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('квітня');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('may');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('мая');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('травня');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('june');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('июня');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('червня');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('july');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('июля');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('липня');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('august');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('августа');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('серпня');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('september');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('сентября');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('вересня');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('october');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('октября');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('жовтня');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('november');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('ноября');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('листопада');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('december_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('декабрь');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('грудень');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('january_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('январь');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('січень');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('february_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('февраль');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('лютий');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('march_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('март');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('березень');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('april_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('апрель');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('квітень');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('may_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('май');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('травень');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('june_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('июнь');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('червень');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('july_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('июль');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('липень');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('august_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('август');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('серпень');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('september_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('сентябрь');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('вересень');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('october_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('октябрь');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('жовтень');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('november_period');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ru');
        $translation->setText('ноябрь');
        $manager->persist($translation);

        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('листопад');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('налоговая декларация');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('податкова декларація');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('единый соц. взнос');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('єдиний соц. внесок');
        $manager->persist($translation);

        $text = new Text();
        $text->setText('единый налог');
        $manager->persist($text);
        $translation = new Translation();
        $translation->setText2($text);
        $translation->setLang('ua');
        $translation->setText('єдиний податок');
        $manager->persist($translation);

        $taxGroup1 = new TaxGroup();
        $taxGroup1->setName('Группа 1');
        $manager->persist($taxGroup1);

        $taxGroup2 = new TaxGroup();
        $taxGroup2->setName('Группа 2');
        $manager->persist($taxGroup2);

        $taxGroup3 = new TaxGroup();
        $taxGroup3->setName('Группа 3');
        $manager->persist($taxGroup3);

        $taxGroup4 = new TaxGroup();
        $taxGroup4->setName('Группа 4');
        $manager->persist($taxGroup4);

        $taxGroup5 = new TaxGroup();
        $taxGroup5->setName('Группа 5');
        $manager->persist($taxGroup5);

        $taxGroup6 = new TaxGroup();
        $taxGroup6->setName('Группа 6');
        $manager->persist($taxGroup6);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('yearly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(40);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task1);
        $taskGroupValue->setGroup($taxGroup1);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('yearly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(40);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task1);
        $taskGroupValue->setGroup($taxGroup2);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(40);
        $taskGroupValue->setAccumulate(1);
        $taskGroupValue->setTask($task1);
        $taskGroupValue->setGroup($taxGroup3);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(40);
        $taskGroupValue->setAccumulate(1);
        $taskGroupValue->setTask($task1);
        $taskGroupValue->setGroup($taxGroup5);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(40);
        $taskGroupValue->setAccumulate(1);
        $taskGroupValue->setTask($task1);
        $taskGroupValue->setGroup($taxGroup4);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(40);
        $taskGroupValue->setAccumulate(1);
        $taskGroupValue->setTask($task1);
        $taskGroupValue->setGroup($taxGroup6);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('monthly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(20);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task2);
        $taskGroupValue->setGroup($taxGroup1);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('monthly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(20);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task2);
        $taskGroupValue->setGroup($taxGroup2);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('monthly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(20);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task2);
        $taskGroupValue->setGroup($taxGroup3);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('monthly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(20);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task2);
        $taskGroupValue->setGroup($taxGroup5);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(20);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task2);
        $taskGroupValue->setGroup($taxGroup1);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(20);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task2);
        $taskGroupValue->setGroup($taxGroup2);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(20);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task2);
        $taskGroupValue->setGroup($taxGroup3);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(20);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task2);
        $taskGroupValue->setGroup($taxGroup5);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('monthly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(1);
        $taskGroupValue->setDays(50);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task3);
        $taskGroupValue->setGroup($taxGroup1);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('monthly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(1);
        $taskGroupValue->setDays(50);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task3);
        $taskGroupValue->setGroup($taxGroup2);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(50);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task3);
        $taskGroupValue->setGroup($taxGroup3);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(50);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task3);
        $taskGroupValue->setGroup($taxGroup5);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(50);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task3);
        $taskGroupValue->setGroup($taxGroup4);
        $manager->persist($taskGroupValue);

        $taskGroupValue = new TaskGroupValues();
        $taskGroupValue->setPeriod('quarterly');
        $taskGroupValue->setDayFrom(1);
        $taskGroupValue->setAvans(0);
        $taskGroupValue->setDays(50);
        $taskGroupValue->setAccumulate(0);
        $taskGroupValue->setTask($task3);
        $taskGroupValue->setGroup($taxGroup6);
        $manager->persist($taskGroupValue);

        $manager->flush();
    }

}