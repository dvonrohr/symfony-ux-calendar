<?php

namespace App\Dvonrohr\UXCalendar\Twig;

use App\Dvonrohr\UXCalendar\Model\Calendar;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * @author Daniel Von Rohr <d.rudolf.von.rohr@gmail.com>
 *
 * @final
 * @experimental
 */
class CalendarExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('render_calendar', [$this, 'renderCalendar'], ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }

    public function renderCalendar(Environment $env, Calendar $calendar, array $attributes = []): string
    {
        $calendar->setAttributes(array_merge($calendar->getAttributes(), $attributes));

        $html = '
            <div
                data-controller="'.trim($calendar->getDataController().' @dvonrohr/uxcalendarbundle/calendar').'"
                data-view="'.twig_escape_filter($env, json_encode($calendar->createView()), 'html_attr').'"
            ';

        foreach ($calendar->getAttributes() as $name => $value) {
            if ('data-controller' === $name) {
                continue;
            }

            if (true === $value) {
                $html .= $name . '=' . $name . '" ';
            } elseif (false !== $value) {
                $html .= $name . '="' . $value . '" ';
            }
        }

        return trim($html).'></div>';
    }
}