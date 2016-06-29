<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('items_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Items:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('items_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Items:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('items_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Items:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('items_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Items:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('items_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Items:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
