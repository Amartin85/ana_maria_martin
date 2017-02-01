<?php
/**
 * Created by PhpStorm.
 * User: Anamary
 * Date: 29/11/2016
 * Time: 17:18
 */

namespace AppBundle\Controller;

use AppBundle\Entity\user;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * index Action
     *
     * @Route(
     *     path="/",
     *     name="app_user_index"
     * )
     *
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){
        $m = $this->getDoctrine()->getManager();

       /* $usuario1 = new user();
        $usuario1
            ->setEmail("usuario1@usuario1.com")
            ->setPassword("1111")
            ->setNombre("pepito");
        $m->persist($usuario1);

       $usuario2 = new user();
        $usuario2
            ->setEmail("usuario2@usuairo.com")
            ->setPassword("2222")
            ->setNombre("fulanito");
        $m->persist($usuario2);

        $usuario3 = new user();
        $usuario3
            ->setEmail("usuario3@usuraio.com")
            ->setPassword("3333")
            ->setNombre("menganito");
        $m->persist($usuario3);*/

        $m->flush();



        $repositoy= $m->getRepository('AppBundle:user');

        /**
         * @var user $user
         */
        //$user = $repository->findOneByNombre('Usuario2');
        //$user->setEmail('nuevo@email.com);
        //$m->remove($user);

        $users = $repositoy->findAll();

        return $this->render(':user:index.html.twig',
            [
                'users'=>$users,
            ]
            );

    }

    /**
     * updateAction
     *
     * @Route(
     *     path="/update/{id}",
     *     name="app_user_update"
     * )
     *
     */

    public function updateAction($id){
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:user');

        $user = $repository->find($id);

        return $this->render(':user:update.html.twig',
            [
                'user'=> $user,
            ]
            );
    }

    /**
     * doUpdateAction
     *
     * @Route(
     *     path="/do-update",
     *     name="app_user_doUpdate"
     * )
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function doUpdateAction(Request $request){
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:user');

        $id = $request->request->get('id');
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $nombre = $request->request->get('nombre');

        $user = $repository->find($id);

        $user->setEmail($email);
        $user->setPassword($password);
        $user->setNombre($nombre);

        $m->flush();

        $this->addFlash('messages', 'User update');

        return $this->redirectToRoute('app_user_index');

    }

    /**
     * @Route(
     *     path="/insert",
     *     name="app_user_insert"
     * )
     */

    public function insertAction(){
        return $this->render(':user:insert.html.twig');
    }

    /**
     * @Route(
     *     path="/do-insert",
     *     name="app_user_doInsert"
     * )
     */

    public function doInsertAction(Request $request){
        $user = new user();

        $user->setEmail($request->request->get('email'));
        $user->setPassword($request->request->get('password'));
        $user->setNombre($request->request->get('nombre'));

        $m = $this->getDoctrine()->getManager();
        $m->persist($user);
        $m->flush();
        $this->addFlash('message', 'New user create');

        return $this->redirectToRoute('app_user_index');
    }

    /**
     * @Route(
     *     path="/remove/{id}",
     *     name="app_user_remove"
     * )
     */

    public function removeAction($id){
        $m = $this->getDoctrine()->getManager();
        $repositoy = $m->getRepository('AppBundle:user');

        $user = $repositoy->find($id);
        $m->remove($user);
        $m->flush();

        $this->addFlash('message', 'User has benn removed');

        return $this->redirectToRoute('app_user_index');
    }


}