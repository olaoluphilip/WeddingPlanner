<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Couple;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CoupleController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function createAction()
    {
        $couple = new Couple();
        $couple->setFirstname();
        $couple->setPrice(19.99);
        $couple->setDescription('Ergonomic and stylish!');

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($couple);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new couple with id '.$couple->getId());
    }

    public function showAction($coupleId)
    {
        $couple = $this->getDoctrine()
            ->getRepository('AppBundle:Couple')
            ->find($coupleId);
        if (!$couple) {
            throw $this->createNotFoundException(
                'No couple found for id '.$coupleId
            );
        }
        // ... do something, like pass the $couple object into a template
    }


}
