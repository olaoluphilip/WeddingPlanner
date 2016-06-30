<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Events;
use AppBundle\Form\EventsType;

/**
 * Events controller.
 *
 */
class EventsController extends Controller
{
    /**
     * Lists all Events entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('AppBundle:Events')->findAll();

        return $this->render('events/index.html.twig', array(
            'events' => $events,
        ));
    }

    /**
     * Creates a new Events entity.
     *
     */
    public function newAction(Request $request)
    {
        $event = new Events();
        $form = $this->createForm('AppBundle\Form\EventsType', $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('events_show', array('event' => $event->getId()));
        }

        return $this->render('events/new.html.twig', array(
            'event' => $event,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Events entity.
     *
     */
    public function showAction(Events $event)
    {
        $deleteForm = $this->createDeleteForm($event);

        return $this->render('events/show.html.twig', array(
            'event' => $event,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Events entity.
     *
     */
    public function editAction(Request $request, Events $event)
    {
        $deleteForm = $this->createDeleteForm($event);
        $editForm = $this->createForm('AppBundle\Form\EventsType', $event);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('events_edit', array('event' => $event->getId()));
        }

        return $this->render('events/edit.html.twig', array(
            'event' => $event,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Events entity.
     *
     */
    public function deleteAction(Request $request, Events $event)
    {
        $form = $this->createDeleteForm($event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($event);
            $em->flush();
        }

        return $this->redirectToRoute('events_index');
    }

    /**
     * Creates a form to delete a Events entity.
     *
     * @param Events $event The Events entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Events $event)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('events_delete', array('id' => $event->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
