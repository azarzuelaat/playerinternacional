<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Info;
use AppBundle\Entity\Legal;
use AppBundle\Form\Type\InfoType;
use AppBundle\Form\Type\LegalType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LegalController extends Controller {

        /**
         * @Route("/legal.html", name="legal", defaults={"num":"uno"})
         */
        public function indexAction(Request $request) {
                $manager = $this->getManager();
                $items = $manager->getAllItems();

                $info = $manager->getInfo();

                $params = array(
                    'items' => $items,
                    'info' => $info
                );

                return $this->render('legal/index.html.twig', $params);
        }

        /**
         * @Route("/legal/list/{page}", name="legal_list", defaults={"page":1})
         * 
         * @param Request $request
         * @return type
         */
        public function listAction(Request $request) {
                $page = $request->get('page');
                $manager = $this->getManager();

                $info = $manager->getInfo();

                $form = $this->createForm(new InfoType(), $info);
                $form->handleRequest($request);

                if ($form->isValid()) {
                        $data = $form->getData();
                        $manager->saveInfo($data);

                        $this->addFlash('form', 'Cambios realizados con exito');
                        return $this->redirectToRoute('legal_list');
                }

                $pager = $manager->getPagination($page);

                $params = array(
                    'pager' => $pager,
                    'form' => $form->createView()
                );

                return $this->render('legal/list.html.twig', $params);
        }

        /**
         * @Route("/legal/new", name="legal_new")
         * 
         * @param Request $request
         * @return type
         */
        public function newAction(Request $request) {
                $manager = $this->getManager();

                $form = $this->createForm(new LegalType(), new Legal());
                $form->handleRequest($request);

                if ($form->isValid()) {
                        $data = $form->getData();

                        $legal = $manager->saveLegal($data);

                        $this->addFlash('form', 'Item creado con exito');
                        return $this->redirectToRoute('legal_list');
                }

                $params = array(
                    'form' => $form->createView()
                );

                return $this->render('legal/new.html.twig', $params);
        }

        /**
         * @Route("/legal/edit/{id}", name="legal_edit")
         * 
         * @param Request $request
         * @return type
         */
        public function editAction($id, Request $request) {
                $manager = $this->getManager();
                $legal = $manager->getLegal($id);

                $form = $this->createForm(new LegalType(), $legal);

                $form->handleRequest($request);
                if ($form->isValid()) {
                        $legal = $form->getData();

                        $manager->saveLegal($legal);

                        $this->addFlash('form', 'Item actualizado con exito');

                        return $this->redirectToRoute('legal_list');
                }

                $params = array(
                    'form' => $form->createView(),
                );

                return $this->render('legal/edit.html.twig', $params);
        }

        /**
         * @Route("/legal/delete/{id}", name="legal_delete")
         * 
         * @param Request $request
         * @return type
         */
        public function deleteAction($id, Request $request) {
                $manager = $this->getManager();

                $legal = $manager->getLegal($id);

                if (!empty($legal)) {
                        $manager->deleteLegal($legal);
                }
                return $this->redirect($this->generateUrl('legal_list'));
        }

        private function getManager() {
                return $this->container->get('app.legal.manager');
        }

}
