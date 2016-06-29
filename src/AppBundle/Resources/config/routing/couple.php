<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('couple_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Couple:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('couple_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Couple:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('couple_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Couple:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('couple_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Couple:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('couple_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Couple:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
