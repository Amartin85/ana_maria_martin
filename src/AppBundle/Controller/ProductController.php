<?php
/**
 * Created by PhpStorm.
 * User: Anamary
 * Date: 29/11/2016
 * Time: 17:20
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    /**
 * index Action
 *
 * @Route(
 *     path="/",
 *     name="app_Product_index"
 * )
 *
 *
 * @return \Symfony\Component\HttpFoundation\Response
 */

    public function indexAction(){
        $m = $this->getDoctrine()->getManager();

        /* $product = new Product();
         $product
             ->setNombre("Samsung")
             ->setDescripicion("SG7 EDGE, EL MAS CARO")
             ->setPrecio(700.00);
         $m->persist($product);*/
        $m->flush();
        $repository = $m->getRepository('AppBundle:Product');


        /**
         * @var Product $Product
         */
        $Products = $repository->findAll();

        return $this->render(':Product:index.html.twig',
            [
                'Products'=>$Products,
            ]
        );
    }

    /**
     * updateAction
     *
     * @Route(
     *     path="/update/{id}",
     *     name="app_Product_update"
     * )
     *
     */

    public function updateAction($id){
        /*Parte de crud no sirve para form
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Product');

        $Product = $repository->find($id);

        return $this->render(':Product:update.html.twig',
            [
                'Product' =>$Product
            ]
        );*/

        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Product');

        $Product = $repository->find($id);

        $form = $this->createForm(ProductType::class, $Product);

        return $this->render(':Product:form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_Product_doUpdate', ['id' => $id])
            ]
        );
    }
    /**
     * doUpdateAction
     *
     * @Route(
     *     path="/do-update",
     *     name="app_Product_doUpdate"
     * )
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function doUpdateAction($id, Request $request){
        /*Esto es para crud no sirve para form
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Product');

        $id = $request->request->get('id');
        $nombre = $request->request->get('nombre');
        $descripcion = $request->request->get('descripicion');
        $precio = $request->request->get('precio');

        $Product = $repository->find($id);

        $Product->setNombre($nombre);
        $Product->setDescripcion($descripcion);
        $Product->setPrecio($precio);

        $m->flush();

        $this->addFlash('Message', 'Product update');

        return $this->redirectToRoute('app_Product_index');*/
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Product');
        $Product = $repository->find($id);
        $form = $this->createForm(ProductType::class, $Product);

        $form->handleRequest($request);

        if ($form->isValid()){
            $m->flush();
            $this->addFlash('message', 'Product updated');
            return $this->redirectToRoute('app_Product_index');
        }

        $this->addFlash('messages', 'Review your from');
        return $this->render(':Product:form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_Product_doUpdate', ['id' =>$id])
            ]
        );
    }
    /**
     * @Route(
     *     path="/insert",
     *     name="app_Product_insert"
     * )
     */
    public function insertAction(){

        /* Esto es la parte de crud sin el form
        return $this->render(':Product:insert.html.twig');*/

        /*Ahora vamos a crear el formulario desde el action "form"*/

        $Product = new Product();
        $form = $this->createForm(ProductType::class, $Product);

        return $this->render(':Product:form.html.twig',
            [
                'form'=> $form->createView(),
                'action' =>$this->generateUrl('app_Product_doInsert')
            ]
        );
    }
    /**
     * @Route(
     *     path="/do-insert",
     *     name="app_Product_doInsert"
     * )
     */
    public function doInsertAction(Request $request){
        /*Parte de crub, no vale para los form
        $Product = new Product();
        $Product->setNombre($request->request->get('nombre'));
        $Product->setDescripcion($request->request->get('descripcion'));
        $Product->setPrecio($request->request->get('precio'));



        $m = $this->getDoctrine()->getManager();
        $m->persist($Product);
        $m->flush();
        $this->addFlash('Message', 'Product insert');

        return $this->redirectToRoute('app_Product_index');*/

        $Product = new Product();
        $form = $this->createForm(ProductType::class, $Product);

        $form->handleRequest($request);

        if($form->isValid()){
            $m= $this->getDoctrine()->getManager();
            $m->persist($Product);
            $m->flush();

            $this->addFlash('messages', 'Product added');

            return $this->redirectToRoute('app_Product_index');
        }

        $this->addFlash('messages', 'Review your form data');

        return $this->render(':Product:form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_Product_doInsert')
            ]
        );





    }
    /**
     * @Route(
     *     path="/remove/{id}",
     *     name="app_Product_remove"
     * )
     */
    public function removeAction($id){
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Product');

        $Product = $repository->find($id);
        $m->remove($Product);
        $m->flush();

        $this->addFlash('Message', 'Product remove');

        return $this->redirectToRoute('app_Product_index');
    }

}