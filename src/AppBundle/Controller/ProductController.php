<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Product;
use AppBundle\Entity\categorie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="productpage")
     */
    public function addAction(Request $request)
    {
        $product=new Product();
        $form=$this->createForm('AppBundle\Form\ProductType',$product);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
        }
        return $this->render('default/product.html.twig',array(
            '$product'=>$product,
            'form'=>$form->createView(),
        ));
    }

    /**
     * @Route("/liste",name="liste_des_produit")
     */
    public function list_productAction(){
        $repository= $this->getDoctrine()->getRepository("AppBundle:Product");

        $product =$repository->findAll();

        return $this->render('Default/liste.html.twig',array(
           'product'=>$product,
        ));
    }

    /**
     *
     * @return Response
     * @Route("/edit/{id}",name="edit_product")
     */
    public function editAction(Request $request,Product $product)
    {

        $form=$this->createForm('AppBundle\Form\ProductType',$product);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em=$this->getDoctrine()->getManager();

            $em->flush();
            return new Response("produit modifiée");
        }
        return $this->render('default/product.html.twig',array(
            '$product'=>$product,
            'form'=>$form->createView(),
        ));

    }

    /**
     *
     * @return Response
     *
     * @Route("/delete/{id}",name="delete_product")
     */
    public function  delete(Product $product){
        $em=$this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();

        return new Response("product deleted");
    }
    /**
     *
     * @Route("/categorie",name="categorie_add")
     *
     */

    public function addcategorieAction(Request $request){
        $categorie =new categorie();
        $form=$this->createForm('AppBundle\Form\categorieType',$categorie);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
        }
        return $this->render('default/categorie.html.twig',
            array('categorie'=>$categorie,'form'=>$form->createView(),
                ));

    }

}
