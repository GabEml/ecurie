<?php

namespace App\EventSubscriber;

use App\Repository\PlanningBoxRepository;
use CalendarBundle\CalendarEvents;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CalendarSubscriber implements EventSubscriberInterface
{
    private $planningBoxRepository;
    private $router;

    public function __construct(
        PlanningBoxRepository $planningBoxRepository,
        UrlGeneratorInterface $router
    ) {
        $this->planningBoxRepository = $planningBoxRepository;
        $this->router = $router;
    }

    public static function getSubscribedEvents()
    {
        return [
            CalendarEvents::SET_DATA => 'onCalendarSetData',
        ];
    }

    public function onCalendarSetData(CalendarEvent $calendar)
    {
        $start = $calendar->getStart();
        $end = $calendar->getEnd();
        $filters = $calendar->getFilters();

        // Modify the query to fit to your entity and needs
        // Change booking.beginAt by your start date property
        $plannings = $this->planningBoxRepository
            ->createQueryBuilder('planning_box')
            ->where('planning_box.date_debut BETWEEN :start and :end OR planning_box.date_fin BETWEEN :start and :end')
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->setParameter('end', $end->format('Y-m-d H:i:s'))
            ->getQuery()
            ->getResult()
        ;

        foreach ($plannings as $planning) {
            // this create the events with your data (here booking data) to fill calendar
            $planningBoxEvent = new Event(
                $planning->getTitle(),
                $planning->getBeginAt(),
                $planning->getEndAt() // If the end date is null or not defined, a all day event is created.
            );

            /*
             * Add custom options to events
             *
             * For more information see: https://fullcalendar.io/docs/event-object
             * and: https://github.com/fullcalendar/fullcalendar/blob/master/src/core/options.ts
             */

            $planningBoxEvent->setOptions([
                'backgroundColor' => 'red',
                'borderColor' => 'red',
            ]);
            $planningBoxEvent->addOption(
                'url',
                $this->router->generate('app_profil', [
                    'id' => $planning->getId(),
                ])
            );

            // finally, add the event to the CalendarEvent to fill the calendar
            $calendar->addEvent($planningBoxEvent);
        }
    }
}