<?php

namespace SeoBundle\Controller;

use SeoBundle\Entity\Topical;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Topical controller.
 *
 * @Route("topical")
 */
class TopicalController extends Controller
{
    /**
     * Lists all topical entities.
     *
     * @Route("/", name="topical_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $topicals = $em->getRepository('SeoBundle:Topical')->findAll();

        return $this->render('topical/index.html.twig', array(
            'topicals' => $topicals,
        ));
    }

    /**
     * Creates a new topical entity.
     *
     * @Route("/new", name="topical_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $topical = new Topical();
        $form = $this->createForm('SeoBundle\Form\TopicalType', $topical);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($topical);
            $em->flush($topical);

            return $this->redirectToRoute('topical_show', array('id' => $topical->getId()));
        }

        return $this->render('topical/new.html.twig', array(
            'topical' => $topical,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a topical entity.
     *
     * @Route("/{id}", name="topical_show")
     * @Method("GET")
     */
    public function showAction(Topical $topical)
    {
        $deleteForm = $this->createDeleteForm($topical);

        return $this->render('topical/show.html.twig', array(
            'topical' => $topical,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing topical entity.
     *
     * @Route("/{id}/edit", name="topical_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Topical $topical)
    {
        $deleteForm = $this->createDeleteForm($topical);
        $editForm = $this->createForm('SeoBundle\Form\TopicalType', $topical);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('topical_edit', array('id' => $topical->getId()));
        }

        return $this->render('topical/edit.html.twig', array(
            'topical' => $topical,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a topical entity.
     *
     * @Route("/{id}", name="topical_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Topical $topical)
    {
        $form = $this->createDeleteForm($topical);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($topical);
            $em->flush($topical);
        }

        return $this->redirectToRoute('topical_index');
    }

    /**
     * Creates a form to delete a topical entity.
     *
     * @param Topical $topical The topical entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Topical $topical)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('topical_delete', array('id' => $topical->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
