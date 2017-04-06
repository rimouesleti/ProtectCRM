<?php

namespace CRM\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CRM\PagesBundle\Entity\contact;
//use CRM\PagesBundle\Entity\histories;
use CRM\PagesBundle\Form as Form;
use Doctrine\Common\Collections\Collection;

class ContactController extends Controller {

    public function showAllAction() {

        $repository = $this->getDoctrine()->getManager()->getRepository("PagesBundle:contact");
        $contacts = $repository->findBy(Array(), Array('id' => 'DESC'));

        return $this->render('PagesBundle:Contact:showAll.html.twig', array('contacts' => $contacts));
    }

    public function newAction() {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getEntityManager();
        $form = $this->createForm(new Form\contactType(), new contact());
        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {

            $data = $form->getData();
            // $data->setUser($user);
            $em->persist($data);
            $em->flush();

            //   $entityName = $data->getName();
            //   $entityID = $data->getId();
            // $today = new \DateTime("now");
            // $history = new histories();

            /* $history->setUser($user);
              $history->setDate($today);
              $history->setAction("added");
              $history->setFeatureName($entityName);
              $history->setFeatureId($entityID);
              $history->setFeatureType("entity");

              $em->persist($history);
              $em->flush(); */



            return $this->redirect($this->generateUrl('contacts'));
        }else{
            $form->getErrors();
        }
        
        return $this->render('PagesBundle:Contact:new.html.twig', array(
                    'form' => $form->createView()
        ));
    }

  public function deleteAction($id)
    {
        $user = $this->getUser();


        $em = $this->getDoctrine()->getEntityManager();
        $contact = $em->getRepository('PagesBundle:contact')->find($id);
        if (!$contact) {
            throw $this->createNotFoundException('No contact found for id ' . $id);
        }
        //$entityName = $contact->getF();


        $em->remove($contact);
        $em->flush();

       /* $history = new histories();
        $history->setUser($user);

        $today = new \DateTime("now");
        $history->setDate($today);

        $history->setAction("deleted");
        $history->setFeatureName($entityName);
        $history->setFeatureType("entity");

        $em->persist($history);
        $em->flush();*/

        return $this->redirect($this->generateUrl('contacts'));
    }
    
     public function editAction($id)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository("PagesBundle:contact");
        $contact = $repository->find($id);
        if ($contact === null) {
            return $this->redirect($this->generateUrl('contacts'));
        }
        $user = $this->getUser();

        $em = $this->getDoctrine()->getEntityManager();

        $form = $this->createForm(new Form\contactType(), $contact);
        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $data = $form->getData();
          //  $data->setUser($user);
           // $contact->preUpload();
            $em->persist($data);
            $em->flush();

            //$today = new \DateTime("now");
           // $entityName = $data->getName();
           // $entityID = $data->getId();

           /* $history = new histories();
            $history->setUser($user);
            $history->setDate($today);
            $history->setAction("updated");
            $history->setFeatureName($entityName);
            $history->setFeatureId($entityID);
            $history->setFeatureType("entity");

            $em->persist($history);
            $em->flush();*/

            return $this->redirect($this->generateUrl('contacts'));
        }
        return $this->render('PagesBundle:Contact:edit.html.twig', array(
                    'form' => $form->createView(),
                    'contact' => $contact));
    }

}
