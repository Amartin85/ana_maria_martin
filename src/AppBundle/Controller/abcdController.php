<?php
/**
 * Created by PhpStorm.
 * User: Anamary
 * Date: 27/01/2017
 * Time: 15:37
 */

namespace AppBundle\Controller;


use AppBundle\Entity\abcd;
use AppBundle\Form\abcdType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;


class abcdController extends Controller
{
    /**
     * index Action
     *
     * @Route(
     *     path="/",
     *     name="app_abcd_index"
     * )
     *
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){
        $p = $this->getDoctrine()->getManager();
        $p->flush();
        $repository = $p->getRepository('AppBundle:abcd');
        $abcd = $repository->findAll();

        return $this->render(':abcd:index.html.twig',
        [
            'abcd'=>$abcd
        ]
        );
    }

    /**
     * @Route(
     *     path="/insert",
     *     name="app_abcd_insert"
     * )
     */

    public function insertAction(){
        $abcd = new abcd();
        $form = $this->createForm(abcdType::class, $abcd);

        return $this->render(':abcd:form.html.twig',
            [
                'form'=> $form->createView(),
                'action' =>$this->generateUrl('app_abcd_doInsert')
            ]
        );
    }

    /**
     * @Route(
     *     path="/do-insert",
     *     name="app_abcd_doInsert"
     * )
     */

    public function doInsertAction(Request $request){

        $abcd = new abcd();
        $form = $this->createForm(abcdType::class, $abcd);
        $form->handleRequest($request);

        if ($form->isValid()){
            $p = $this->getDoctrine()->getManager();
            $p->persist($abcd);
            $p->flush();

            $this->addFlash('mensaje', 'insertado');

            return $this->redirectToRoute('app_abcd_index');
        }

        $this->addFlash('mensaje', 'revisa el formulario');

        return $this->render(':abcd_form.html.twig',
            [
                'form'=> $form->createView(),
                'action' => $this->generateUrl('app_abcd_doInsert')
            ]
            );
    }

    /**
     * updateAction
     *
     * @Route(
     *     path="/update/{id}",
     *     name="app_abcd_update"
     * )
     *
     */

    public function updateAction($id){
        $p = $this->getDoctrine()->getManager();
        $repository = $p->getRepository('AppBundle:abcd');
        $abcd = $repository->find($id);
        $form = $this->createForm(abcdType::class, $abcd);

        return $this->render(':abcd:form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_abcd_doUpdate', ['id' => $id])
            ]
            );
    }

    /**
     * doUpdateAction
     *
     * @Route(
     *     path="/do-update",
     *     name="app_abcd_doUpdate"
     * )
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function doUpdateAction($id, Request $request){
        $p = $this->getDoctrine()->getManager();
        $repository = $p->getRepository('AppBundle:abcd');
        $abcd = $repository->find($id);
        $form = $this->createForm(abcdType::class, $abcd);

        $form->handleRequest($request);

        if($form->isValid()){
            $p->flush();
            $this->addFlash('mensaje', 'actualizado');
            return $this->redirectToRoute('app_abcd_index');
        }
        $this->addFlash('mensaje', 'revisa el formulario');
        return $this->render('abcd:form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_abcd_doUpdate', ['id' => $id])
            ]
            );
    }

    /**
     * @Route(
     *     path="/remove/{id}",
     *     name="app_abcd_remove"
     * )
     */

    public function removeAction($id){
        $p = $this->getDoctrine()->getManager();
        $repository = $p->getRepository('AppBundle:abcd');
        $abcd = $repository->find($id);
        $p->remove($abcd);
        $p->flush();
        $this->addFlash('mensaje', 'eliminado');

        return $this->redirectToRoute('app_abcd_index');
    }
}