<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('guests_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Guests:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('guests_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Guests:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('guests_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Guests:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('guests_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Guests:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('guests_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Guests:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
