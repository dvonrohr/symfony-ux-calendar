<?php

namespace App\Dvonrohr\UXCalendar\Builder;

use App\Dvonrohr\UXCalendar\Model\Calendar;

/**
 * @author Daniel Von Rohr <d.rudolf.von.rohr@gmail.com>
 *
 * @experimental
 */
interface CalendarBuilderInterface
{
    public function createCalendar(): Calendar;
}
