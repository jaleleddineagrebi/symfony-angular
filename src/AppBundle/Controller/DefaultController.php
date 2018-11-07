<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Plat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/plat", name="platpage")
     */
    public function ajoutAction(Request $request)
    {
        $plat=new Plat();
        $form=$this->createForm('AppBundle\Form\PlatType',$plat);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($plat);
            $em->flush($plat);
        }
        return $this->render('default/plat.html.twig',array(
            'plat'=>$plat,
            'form'=>$form->createView(),

        ));
    }

}
