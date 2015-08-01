<?php

namespace Oxhild\MtgBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Oxhild\MtgBundle\Form\NewBinderForm;
use Oxhild\MtgBundle\Entity\Binder;
use Symfony\Component\HttpFoundation\Request;

class BinderController extends Controller
{

    public function listAction()
    {
        $user = $this->getUser();
        $binders = $this->getDoctrine()
            ->getRepository('OxhildMtgBundle:Binder')
            ->findBy([
                'user' => $user->getId()]
            );

        dump($binders);

        return $this->render('OxhildMtgBundle:Binder:list.html.twig', array(
            'binders' => $binders
        ));
    }

    public function newAction(Request $request)
    {
        $form = $this->createForm(new NewBinderForm());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            dump($data);
            $em = $this->getDoctrine()->getManager();

            $binder = new Binder();
            $binder->setName($data['name'])
                ->setDescription($data['description']);

            if ($data['private'] == true) {
                $binder->setPrivate(1);
            } elseif ($data['private'] == false) {
                $binder->setPrivate(0);
            } else {
                return false;
            }

            $binder->setAddedDate(new \DateTime("now"))
                ->setUpdatedDate(new \DateTime("now"));

            $user = $this->getUser();
            $binder->setUser($user);
            $em->persist($binder);
            $em->flush();
        }

        return $this->render('OxhildMtgBundle:Binder:new.html.twig', array(
            'form' => $form->createView()
        ));
    }

}