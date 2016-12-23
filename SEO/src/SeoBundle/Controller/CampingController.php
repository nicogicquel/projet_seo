<?php

namespace SeoBundle\Controller;

use SeoBundle\Entity\Camping;
use SeoBundle\Form\CampingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Camping controller.
 *
 * @Route("camping")
 */
class CampingController extends Controller
{
    /**
     * Lists all camping entities.
     *
     * @Route("/", name="camping_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $campings = $em->getRepository('SeoBundle:Camping')->findAll();

        return $this->render('camping/index.html.twig', array(
            'campings' => $campings,
            
        ));
    }

    /**
     * Creates a new camping entity.
     *
     * @Route("/new", name="camping_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $camping = new Camping();
        $form = $this->createForm('SeoBundle\Form\CampingType', $camping);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($camping);
            $em->flush($camping);

            return $this->redirectToRoute('camping_show', array('id' => $camping->getId()));
        }

        return $this->render('camping/new.html.twig', array(
            'camping' => $camping,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a camping entity.
     *
     * @Route("/{id}", name="camping_show")
     * @Method("GET")
     */
    public function showAction(Request $request, Camping $camping)
    {
        $em = $this->getDoctrine()->getManager();
        $region= $camping->getRegion();
        $departement= $camping->getDepartement();
        $ville= $camping->getVille();
        $sites = $em->getRepository('SeoBundle:Site')->findSite($region, $departement, $ville);
        $deleteForm = $this->createDeleteForm($camping);


        return $this->render('camping/show.html.twig', array(
            'camping' => $camping,
            'delete_form' => $deleteForm->createView(),
            'sites' => $sites
            
        ));
        
    }

    /**
     * Displays a form to edit an existing camping entity.
     *
     * @Route("/{id}/edit", name="camping_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Camping $camping)
    {
        $deleteForm = $this->createDeleteForm($camping);
        $editForm = $this->createForm('SeoBundle\Form\CampingType', $camping);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('camping_edit', array('id' => $camping->getId()));
        }

        return $this->render('camping/edit.html.twig', array(
            'camping' => $camping,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a camping entity.
     *
     * @Route("/{id}", name="camping_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Camping $camping)
    {
        $form = $this->createDeleteForm($camping);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($camping);
            $em->flush($camping);
        }

        return $this->redirectToRoute('camping_index');
    }

    /**
     * Creates a form to delete a camping entity.
     *
     * @param Camping $camping The camping entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Camping $camping)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('camping_delete', array('id' => $camping->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function rempliAction()
    {
        $request = $this->getRequest();
 
        if($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $id = $request->request->get('id');
            $selecteur = $request->request->get('select');
           
        if ($id != null)
        {  
            $data = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('sdzBikindBundle:'.$selecteur)
                        ->$selecteur($id);
             
            return new JsonResponse($data);
        }
  }
  return new Response("Nonnn ....");       
}

    
}
