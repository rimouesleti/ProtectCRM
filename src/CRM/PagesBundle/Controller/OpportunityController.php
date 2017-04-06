<?php

namespace CRM\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CRM\PagesBundle\Entity\opportunity;
use CRM\PagesBundle\Entity\entities;
//use CRM\PagesBundle\Entity\histories;
use CRM\PagesBundle\Form\opportunityType as opportunityForm;

class OpportunityController extends Controller {

    public function showAllAction() {
        $repository = $this->getDoctrine()->getManager()->getRepository("PagesBundle:opportunity");
        $opportunities = $repository->findAll();
        return $this->render('PagesBundle:Opportunity:showAll.html.twig', array('opportunities' => $opportunities));
    }

    public function newAction($entity_id) {
        $repository = $this->getDoctrine()->getManager()->getRepository("PagesBundle:entities");
        $entities = $repository->findAll();
        if ($entities !== null) {


            $user = $this->getUser();
            $userId = $user->getId();
            $em = $this->getDoctrine()->getManager();
            $opportunity = new opportunity();

            $form = $this->createForm(new opportunityForm(), $opportunity);
            $form->handleRequest($this->getRequest());

            if ($form->isValid()) {
                $em->persist($opportunity);
                $em->flush();

//                $todoName = $todo->getSubject();
//                $todoID = $todo->getId();
//                $today = new \DateTime("now");
//
//                $history = new histories();
//                $history->setUser($user);
//
//                $history->setDate($today);
//                $history->setAction("added");
//                $history->setFeatureName($todoName);
//                $history->setFeatureId($todoID);
//                $history->setFeatureType("todo");
//                $em->persist($history);
//                $em->flush();


                return $this->redirect($this->generateUrl('opportunities'));
            }


            if ($entity_id !== null) {
                return $this->render('PagesBundle:Opportunity:newOpportunity.html.twig', array(
                            'form' => $form->createView(),
                            'entity_id' => $entity_id,
                            'user_id' => $userId
                ));
            } else {
                return $this->render('PagesBundle:Opportunity:newOpportunity.html.twig', array(
                            'form' => $form->createView(),
                            'entity_id' => null,
                            'user_id' => $userId
                ));
            }
        } else {
            return $this->redirect($this->generateUrl("entities/new"));
        }
    }

    public function editAction($id) {

        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository("PagesBundle:todos");
        $todo = $repository->find($id);


        $form = $this->createForm(new todoForm(), $todo);
        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {

            $em->persist($todo);
            $em->flush();

//            $todoName = $todo->getSubject();
//            $todoID = $todo->getId();
//            $today = new \DateTime("now");
//
//            $history = new histories();
//            $history->setUser($user);
//
//            $history->setDate($today);
//            $history->setAction("updated");
//            $history->setFeatureName($todoName);
//            $history->setFeatureId($todoID);
//            $history->setFeatureType("todo");
//            $em->persist($history);
//            $em->flush();

            return $this->redirect($this->generateUrl('todos'));
        }
        return $this->render('PagesBundle:Todo:edit.html.twig', array(
                    'form' => $form->createView(),
                    'todo' => $todo
        ));
    }

    public function showAction($id) {
        $repository = $this->getDoctrine()->getManager()->getRepository("PagesBundle:todos");
        $todo = $repository->find($id);
        if ($todo === null) {
            return $this->redirect($this->generateUrl('todos'));
        }

        $entityID = $todo->getEntity()->getId();
        //$userID = $todo->getUser()->getId();
        return $this->render('PagesBundle:Todo:show.html.twig', array('todo' => $todo));
    }

    public function deleteAction($id) {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getEntityManager();
        $opportunity = $em->getRepository('PagesBundle:opportunity')->find($id);
        if (!$opportunity) {
            throw $this->createNotFoundException('No opportunity found for id ' . $id);
        }
       // $todoName = $todo->getSubject();
        $em->remove($opportunity);
        $em->flush();



        $today = new \DateTime("now");

//        $history = new histories();
//        $history->setUser($user);
//
//        $history->setDate($today);
//        $history->setAction("deleted");
//        $history->setFeatureName($todoName);
//        $history->setFeatureType("todo");
//        $em->persist($history);
//        $em->flush();


        return $this->redirect($this->generateUrl('opportunities'));
    }

}
