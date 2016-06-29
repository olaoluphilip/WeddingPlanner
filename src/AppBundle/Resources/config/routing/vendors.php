<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('vendors_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Vendors:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('vendors_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Vendors:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('vendors_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Vendors:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('vendors_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Vendors:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('vendors_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Vendors:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
