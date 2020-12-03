<?php

namespace App\Dvonrohr\UXCalendar\DependencyInjection;

use App\Dvonrohr\UXCalendar\Builder\CalendarBuilder;
use App\Dvonrohr\UXCalendar\Builder\CalendarBuilderInterface;
use App\Dvonrohr\UXCalendar\Twig\CalendarExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Twig\Environment;

/**
 * @author Daniel Von Rohr <d.rudolf.von.rohr@gmail.com>
 *
 * @internal
 */
class CalendarjsExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $container
            ->setDefinition('calendarjs.builder', new Definition(CalendarBuilder::class))
            ->setPublic(false)
        ;

        $container
            ->setAlias(CalendarBuilderInterface::class, 'calendar.builder')
            ->setPublic(false)
        ;

        if (class_exists(Environment::class)) {
            $container
                ->setDefinition('calendarjs.twig_extension', new Definition(CalendarExtension::class))
                ->addTag('twig.extension')
                ->setPublic(false)
            ;
        }
    }
}