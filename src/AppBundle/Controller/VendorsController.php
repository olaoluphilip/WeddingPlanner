<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Vendors;
use AppBundle\Form\VendorsType;

/**
 * Vendors controller.
 *
 */
class VendorsController extends Controller
{
    /**
     * Lists all Vendors entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vendors = $em->getRepository('AppBundle:Vendors')->findAll();

        return $this->render('vendors/index.html.twig', array(
            'vendors' => $vendors,
        ));
    }

    /**
     * Creates a new Vendors entity.
     *
     */
    public function newAction(Request $request)
    {
        $vendor = new Vendors();
        $form = $this->createForm('AppBundle\Form\VendorsType', $vendor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vendor);
            $em->flush();

            return $this->redirectToRoute('vendors_show', array('vendor' => $vendor->getId()));
        }

        return $this->render('vendors/new.html.twig', array(
            'vendor' => $vendor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Vendors entity.
     *
     */
    public function showAction(Vendors $vendor)
    {
        $deleteForm = $this->createDeleteForm($vendor);

        return $this->render('vendors/show.html.twig', array(
            'vendor' => $vendor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Vendors entity.
     *
     */
    public function editAction(Request $request, Vendors $vendor)
    {
        $deleteForm = $this->createDeleteForm($vendor);
        $editForm = $this->createForm('AppBundle\Form\VendorsType', $vendor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vendor);
            $em->flush();

            return $this->redirectToRoute('vendors_edit', array('vendor' => $vendor->getId()));
        }

        return $this->render('vendors/edit.html.twig', array(
            'vendor' => $vendor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Vendors entity.
     *
     */
    public function deleteAction(Request $request, Vendors $vendor)
    {
        $form = $this->createDeleteForm($vendor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vendor);
            $em->flush();
        }

        return $this->redirectToRoute('vendors_index');
    }

    /**
     * Creates a form to delete a Vendors entity.
     *
     * @param Vendors $vendor The Vendors entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vendors $vendor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vendors_delete', array('vendor' => $vendor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
