<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('event_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Events:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('event_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Events:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('event_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Events:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('event_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Events:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('event_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Events:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
