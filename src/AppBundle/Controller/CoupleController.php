<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Couple;
use AppBundle\Form\CoupleType;

/**
 * Couple controller.
 *
 */
class CoupleController extends Controller
{
    /**
     * Lists all Couple entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $couples = $em->getRepository('AppBundle:Couple')->findAll();

        return $this->render('couple/index.html.twig', array(
            'couples' => $couples,
        ));
    }

    /**
     * Creates a new Couple entity.
     *
     */
    public function newAction(Request $request)
    {
        $couple = new Couple();
        $form = $this->createForm('AppBundle\Form\CoupleType', $couple);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($couple);
            $em->flush();

            return $this->redirectToRoute('couple_show', array('id' => $couple->getId()));
        }

        return $this->render('couple/new.html.twig', array(
            'couple' => $couple,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Couple entity.
     *
     */
    public function showAction(Couple $couple)
    {
        $deleteForm = $this->createDeleteForm($couple);

        return $this->render('couple/show.html.twig', array(
            'couple' => $couple,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Couple entity.
     *
     */
    public function editAction(Request $request, Couple $couple)
    {
        $deleteForm = $this->createDeleteForm($couple);
        $editForm = $this->createForm('AppBundle\Form\CoupleType', $couple);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($couple);
            $em->flush();

            return $this->redirectToRoute('couple_edit', array('id' => $couple->getId()));
        }

        return $this->render('couple/edit.html.twig', array(
            'couple' => $couple,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Couple entity.
     *
     */
    public function deleteAction(Request $request, Couple $couple)
    {
        $form = $this->createDeleteForm($couple);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($couple);
            $em->flush();
        }

        return $this->redirectToRoute('couple_index');
    }

    /**
     * Creates a form to delete a Couple entity.
     *
     * @param Couple $couple The Couple entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Couple $couple)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('couple_delete', array('id' => $couple->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
