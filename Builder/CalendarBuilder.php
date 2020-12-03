<?php

namespace App\Dvonrohr\UXCalendar\Builder;

use App\Dvonrohr\UXCalendar\Model\Calendar;

/**
 * @author Daniel Von Rohr <d.rudolf.von.rohr@gmail.com>
 */
class CalendarBuilder implements CalendarBuilderInterface
{
    public function createCalendar(): Calendar
    {
        return new Calendar();
    }
}