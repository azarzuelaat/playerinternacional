<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\PasswordType;
use AppBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends Controller {

        /**
         * @Route("/users/list/{page}", name="users_list", defaults={"page":1})
         * 
         * @param Request $request
         * @return type
         */
        public function listAction(Request $request) {

                $page = $request->get('page');
                $manager = $this->getManager();

                $pager = $manager->getPagination($page);

                $params = array(
                    'pager' => $pager
                );

                return $this->render('user/list.html.twig', $params);
        }

        /**
         * @Route("/users/new", name="users_new")
         * 
         * @param Request $request
         * @return type
         */
        public function newAction(Request $request) {
                $manager = $this->getManager();

                $userType = $this->getUserType();
                $form = $this->createForm($userType);
                $form->handleRequest($request);

                if ($form->isValid()) {
                        $data = $form->getData();                
                        $resultUsername = $this->getDoctrine()->getRepository('AppBundle:User')->findOneByUsername($data['username']);
                        $resultEmail = $this->getDoctrine()->getRepository('AppBundle:User')->findOneByEmail($data['email']);
                        $errorMsg="";
                                            
                        if($resultUsername){
                             $errorMsg.='El usuario "'.$data['username'].'" ya existe';               
                        }
                        if($resultEmail){
                             if ($errorMsg!=""){
                                 $errorMsg .=" - ";
                             }
                             $errorMsg.='El email "'.$data['email'].'" ya existe';
                        }   
                        if($resultUsername || $resultEmail){
                             $params = array(
                                  'form' => $form->createView(),
                                  'errorMsg' => $errorMsg,                                
                             );
                            return $this->render('user/new.html.twig', $params);
                        }
                        
                        $user = $manager->createUser($data);

                        $msg = sprintf("se crea el usuario '%d'-'%s'", $user->getId(), $user->getUsername());
                        $this->log("$msg");

                        $this->addFlash('form', 'Usuario creado con exito');
                        return $this->redirectToRoute('users_edit', array('id' => $user->getId()));
                }

                $params = array(
                    'form' => $form->createView()                   
                );

                return $this->render('user/new.html.twig', $params);
        }

        /**
         * @Route("/users/edit/{id}", name="users_edit")
         * 
         * @param int $id
         * @param Request $request
         * @return type
         */
        public function editAction($id, Request $request) {

                $manager = $this->getManager();
                $user = $manager->getUser($id);

                $userType = $this->getUserType();

                $form = $this->createForm($userType, $user);

                $password = $this->createForm(new PasswordType());
                $password->handleRequest($request);

                if ($password->isValid()) {
                        $data = $password->getData();
                        if ($manager->changePassword($user, $data)) {

                                $this->addFlash('pass', 'Password actualizado con exito');

                                $msg = sprintf("cambio de password para el usuario '%d'-'%s'", $user->getId(), $user->getUsername());
                                $this->log("$msg");

                                return $this->redirectToRoute('users_edit', array('id' => $id));
                        } else {
                                $password->addError(new FormError('La constraseña no es correcta'));
                        }
                } else {
                        $form->handleRequest($request);
                }

                if ($form->isValid()) {

                        $manager->updateUser($user);

                        $msg = sprintf("se actualiza el usuario '%d'-'%s'", $user->getId(), $user->getUsername());
                        $this->log("$msg");

                        $this->addFlash('form', 'Usuario actualizado con exito');

                        return $this->redirectToRoute('users_edit', array('id' => $id));
                }


                $params = array(
                    'id' => $id,
                    'form' => $form->createView(),
                    'pass' => $password->createView()
                );

                return $this->render('user/edit.html.twig', $params);
        }

        /**
         * @Route("/users/delete/{id}", name="users_delete")
         * 
         * @param integer $id
         * @param Request $request
         * @return type
         */
        public function deleteAction($id, Request $request) {
                $userManager = $this->get('fos_user.user_manager');
                $user = $userManager->findUserBy(array('id' => $id));

                if (!empty($user)) {
                        $userManager->deleteUser($user);
                }
                return $this->redirect($this->generateUrl('users_list'));
        }

        private function log($msg) {
                $logger = $this->get('logger');
                $logger->notice($msg);
        }

        private function getUserType() {

                $request = $this->get('request');

                $showPassword = $request->get('_route') == 'users_new';
                $showRol = $this->getUser()->hasRole('ROLE_SUPERADMIN');

                $type = new UserType();
                $type->setShowPassword($showPassword)
                        ->setShowRol($showRol);

                return $type;
        }

        private function getManager() {
                return $this->container->get('app.user.manager');
        }

}
