<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Guests;
use AppBundle\Form\GuestsType;

/**
 * Guests controller.
 *
 */
class GuestsController extends Controller
{
    /**
     * Lists all Guests entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $guests = $em->getRepository('AppBundle:Guests')->findAll();

        return $this->render('guests/index.html.twig', array(
            'guests' => $guests,
        ));
    }

    /**
     * Creates a new Guests entity.
     *
     */
    public function newAction(Request $request)
    {
        $guest = new Guests();
        $form = $this->createForm('AppBundle\Form\GuestsType', $guest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($guest);
            $em->flush();

            return $this->redirectToRoute('guests_show', array('id' => $guest->getId()));
        }

        return $this->render('guests/new.html.twig', array(
            'guest' => $guest,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Guests entity.
     *
     */
    public function showAction(Guests $guest)
    {
        $deleteForm = $this->createDeleteForm($guest);

        return $this->render('guests/show.html.twig', array(
            'guest' => $guest,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Guests entity.
     *
     */
    public function editAction(Request $request, Guests $guest)
    {
        $deleteForm = $this->createDeleteForm($guest);
        $editForm = $this->createForm('AppBundle\Form\GuestsType', $guest);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($guest);
            $em->flush();

            return $this->redirectToRoute('guests_edit', array('id' => $guest->getId()));
        }

        return $this->render('guests/edit.html.twig', array(
            'guest' => $guest,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Guests entity.
     *
     */
    public function deleteAction(Request $request, Guests $guest)
    {
        $form = $this->createDeleteForm($guest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($guest);
            $em->flush();
        }

        return $this->redirectToRoute('guests_index');
    }

    /**
     * Creates a form to delete a Guests entity.
     *
     * @param Guests $guest The Guests entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Guests $guest)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('guests_delete', array('id' => $guest->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
