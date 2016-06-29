<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Items;
use AppBundle\Form\ItemsType;

/**
 * Items controller.
 *
 */
class ItemsController extends Controller
{
    /**
     * Lists all Items entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $items = $em->getRepository('AppBundle:Items')->findAll();

        return $this->render('items/index.html.twig', array(
            'items' => $items,
        ));
    }

    /**
     * Creates a new Items entity.
     *
     */
    public function newAction(Request $request)
    {
        $item = new Items();
        $form = $this->createForm('AppBundle\Form\ItemsType', $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('items_show', array('id' => $item->getId()));
        }

        return $this->render('items/new.html.twig', array(
            'item' => $item,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Items entity.
     *
     */
    public function showAction(Items $item)
    {
        $deleteForm = $this->createDeleteForm($item);

        return $this->render('items/show.html.twig', array(
            'item' => $item,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Items entity.
     *
     */
    public function editAction(Request $request, Items $item)
    {
        $deleteForm = $this->createDeleteForm($item);
        $editForm = $this->createForm('AppBundle\Form\ItemsType', $item);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('items_edit', array('id' => $item->getId()));
        }

        return $this->render('items/edit.html.twig', array(
            'item' => $item,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Items entity.
     *
     */
    public function deleteAction(Request $request, Items $item)
    {
        $form = $this->createDeleteForm($item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($item);
            $em->flush();
        }

        return $this->redirectToRoute('items_index');
    }

    /**
     * Creates a form to delete a Items entity.
     *
     * @param Items $item The Items entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Items $item)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('items_delete', array('id' => $item->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
