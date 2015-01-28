<?php

namespace SmartCloudSolutions\GubarevBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller for implementation filtering.
 *
 * It provides methods to generate filter form and result.
 *
 * @author Alex Gubarev
 */
class DefaultController extends Controller
{
    protected $weekends = array(0, 6);

    /**
     * Generates a form or result of filtering.
     *
     * @return s Response A Response instance
     *
     */
    public function indexAction()
    {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        if ($request->isXmlHttpRequest()) {
            $group = $request->query->get('taxgroup');
            $esvPeriod = $request->query->get('repiod_esv');
            $lang = $request->query->get('lang');

            $repository = $this->getDoctrine()
                ->getRepository('SmartCloudSolutionsGubarevBundle:TaskGroupValues');

            $values = $repository->findBy(
                array('group' => $group),
                array('task' => 'ASC')
            );

            $em = $this->getDoctrine()->getManager();

            $translationRepository = $em->getRepository('SmartCloudSolutionsGubarevBundle:Text');
            $return = array(
                'list' => array(),
                'error' => ''
            );
            foreach ($values as $key => $value) {
                $result = array();
                $isFilterByPeriod = $value->getTask()->getFilterByPeriod();
                $period = $value->getPeriod();
                if ($isFilterByPeriod
                    && $period !== $esvPeriod
                ) {
                    unset($values[$key]);
                    continue;
                }

                $avans = $value->getAvans();
                $days = $value->getDays() - 1;
                $accumulate = $value->getAccumulate();

                $taskName = $translationRepository->getTranslationByTextLang(
                    $value->getTask()->getName(),
                    $lang
                );

                $phrase = $translationRepository->getTranslationByTextLang(
                        $value->getTask()->getText()->getText(),
                        $lang
                );
                $direction = $value->getTask()->getCriticalDayDirection();

                $yearFrom = date("Y");
                $dayFrom = $value->getDayFrom();
                switch ($period) {
                    case 'yearly':
                        if ($avans) {
                            $period = date("Y",strtotime("+1 year"));
                        } else {
                            $period = date("Y",strtotime("-1 year"));
                        }
                        $monthFrom = 1;
                        $dateTo = $this->getValidDay(
                            strtotime($yearFrom . '/' . $monthFrom . '/'
                                . $dayFrom . ' +' . $days . ' day'
                            ),
                            $days,
                            $direction
                        );
                        $date = getdate($dateTo);
                        $dayTo = $date['mday'];
                        $monthTo = $date['month'];
                        $yearTo = $date['year'];
                        $result = array(
                            array(
                                '%period%' => $period,
                                '%day_from%' => $dayFrom,
                                '%month_from%' => $translationRepository->getTranslationByTextLang(
                                        date('F', mktime(0, 0, 0, $monthFrom, 10)),
                                        $lang
                                    ),
                                '%year_from%' => $yearFrom,
                                '%day_to%' => $dayTo,
                                '%month_to%' => $translationRepository->getTranslationByTextLang(
                                        $monthTo,
                                        $lang
                                    ),
                                '%year_to%' => $yearTo
                            )
                        );
                        break;
                    case 'monthly':
                        if (!$avans) {
                            $period = '';
                            for ($month=1; $month<=12; $month++) {
                                if ($accumulate) {
                                    $period .= $month -1;
                                } else {
                                    $period = $month -1;
                                }
                                if ($period == 0) {
                                    $period = 12;
                                }
                                $dateTo = $this->getValidDay(
                                    strtotime($yearFrom . '/' . $month . '/'
                                        . $dayFrom . ' +' . $days . ' day'
                                    ),
                                    $direction
                                );

                                $date = getdate($dateTo);
                                $dayTo = $date['mday'];
                                $monthTo = $date['month'];
                                $yearTo = $date['year'];
                                $result[] =
                                    array(
                                        '%period%' => $translationRepository->getTranslationByTextLang(
                                                date('F', mktime(0, 0, 0, $period, 10)) . '_period',
                                                $lang
                                            )
                                            . ' ' . ($month == 1 ? $yearFrom - 1 : $yearFrom),
                                        '%day_from%' => $dayFrom,
                                        '%month_from%' => $translationRepository->getTranslationByTextLang(
                                                date('F', mktime(0, 0, 0, $month, 10)),
                                                $lang
                                            ),
                                        '%year_from%' => $yearFrom,
                                        '%day_to%' => $dayTo,
                                        '%month_to%' => $translationRepository->getTranslationByTextLang(
                                                $monthTo,
                                                $lang
                                            ),
                                        '%year_to%' => $yearTo
                                    );
                                $period .= ',';
                            }
                        } else {
                            $period = '';
                            for ($month=0; $month<=11; $month++) {
                                if ($accumulate) {
                                    $period .= $month + 1;
                                } else {
                                    $period = $month + 1;
                                }
                                $dateTo = $this->getValidDay(
                                    strtotime($yearFrom . '/' . $month . '/'
                                        . $dayFrom . ' +' . $days . ' day'
                                    ),
                                    $direction
                                );

                                $date = getdate($dateTo);
                                $dayTo = $date['mday'];
                                $monthTo = $date['month'];
                                $yearTo = $date['year'];
                                $result[] =
                                    array(
                                        '%period%' => $translationRepository->getTranslationByTextLang(
                                                date('F', mktime(0, 0, 0, $period, 10)) . '_period',
                                                $lang
                                            )
                                            . ' ' . ($month == 12 ? $yearFrom + 1 : $yearFrom),
                                        '%day_from%' => 1,
                                        '%month_from%' => $translationRepository->getTranslationByTextLang(
                                                date('F', mktime(0, 0, 0, $month, 10)),
                                                $lang
                                            ),
                                        '%year_from%' => $yearFrom,
                                        '%day_to%' => $dayTo,
                                        '%month_to%' => $translationRepository->getTranslationByTextLang(
                                                $monthTo,
                                                $lang
                                            ),
                                        '%year_to%' => $yearTo
                                    );
                                $period .= ',';
                            }
                        }
                        break;
                    case 'quarterly':
                        $quarterText = $translationRepository->getTranslationByTextLang('квартал', $lang);
                        $quartersText = $translationRepository->getTranslationByTextLang('кварталы', $lang);
                        if (!$avans) {
                            $period = '';
                            for ($quarter=1; $quarter<=4; $quarter++) {
                                $isPluralQuarter = false;
                                if ($accumulate) {
                                    $period .= $quarter -1;
                                } else {
                                    $period = $quarter -1;
                                }
                                if ($period == 0) {
                                    $period = 4;
                                }
                                if ($accumulate && $quarter > 2) {
                                    $isPluralQuarter = true;
                                }
                                $dateTo = $this->getValidDay(
                                    strtotime($yearFrom . '/' . (($quarter - 1) * 3 + 1) . '/'
                                        . $dayFrom . ' +' . $days . ' day'
                                    ),
                                    $direction
                                );

                                $date = getdate($dateTo);
                                $dayTo = $date['mday'];
                                $monthTo = $date['month'];
                                $yearTo = $date['year'];
                                $result[] =
                                    array(
                                        '%period%' => $period . ' ' . ($isPluralQuarter ? $quartersText : $quarterText)
                                                . ' ' . ($quarter == 1 ? $yearFrom - 1 : $yearFrom),
                                        '%day_from%' => 1,
                                        '%month_from%' => $translationRepository->getTranslationByTextLang(
                                                date('F', mktime(0, 0, 0, ($quarter - 1) * 3 + 1, 10)),
                                                $lang
                                            ),
                                        '%year_from%' => $yearFrom,
                                        '%day_to%' => $dayTo,
                                        '%month_to%' => $translationRepository->getTranslationByTextLang(
                                                $monthTo,
                                                $lang
                                            ),
                                        '%year_to%' => $yearTo
                                    );
                                $period .= ',';
                                if ($quarter == 1) {
                                    $period = '';
                                }
                            }
                        }
                        break;
                }

                foreach ($result as $item) {
                    $return['list'][$taskName][] = str_replace(array_keys($item), array_values($item), $phrase);
                }

            }
            if (empty($return['list'])) {
                $return['error'] = $translationRepository->getTranslationByTextLang(
                    'Ничего не найдено',
                    $lang
                );
            }
            return new JsonResponse($return);
        } else {
            $groups = $this->getDoctrine()
                ->getRepository('SmartCloudSolutionsGubarevBundle:Taxgroup')->findAll();
            return $this->render('SmartCloudSolutionsGubarevBundle:Default:index.html.twig', array('groups' => $groups));
        }
    }

    /**
     * Returns a critical day of a task
     *
     * @param int     $day       number of a day to check if it is holiday or weekend
     * @param string  $direction set direction of calculation of critical day
     *
     * @return int a day number
     */
    protected function getValidDay($day, $direction) {
        $repository = $this->getDoctrine()
            ->getRepository('SmartCloudSolutionsGubarevBundle:Holiday');

        $holidays = $repository->getByYear(date("Y"));

        $weekend = in_array(date('w', $day), $this->weekends);
        $holiday = in_array(date('Y-m-d', $day), $holidays);
        while($weekend || $holiday) {
            switch ($direction) {
                case 'after_weekend_holiday':
                    $day = strtotime(date('Y/m/d', $day) . ' +1 day');
                break;
                case 'before_weekend_holiday':
                    $day = strtotime(date('Y/m/d', $day) . ' -1 day');
                break;
            }
            $weekend = in_array(date('w', $day), $this->weekends);
            $holiday = in_array(date('Y-m-d', $day), $holidays);
        }

        return $day;
    }
}