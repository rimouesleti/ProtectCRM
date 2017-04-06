<?php

namespace CRM\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CRM\UserBundle\Entity\User;
use CRM\UserBundle\Form\UserType;
use Doctrine\Common\Collections\Criteria;

class ContributorsController extends Controller
{

    public function showcontributorsAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('UserBundle:User');
        $Users = $repository->findAll();

        return $this->render('UserBundle:Contributors:show.html.twig', array('Users' => $Users));
    }





    public function deletecontributorsAction($id)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('UserBundle:User')->find($id);
        if (!$user) {
            throw $this->createNotFoundException('No user found for id ' . $id);
        }
        $em->remove($user);
        $em->flush();

        return $this->redirect($this->generateUrl('contributors'));
    }

}
