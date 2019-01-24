<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Promo;
use AppBundle\Form\Type\PromoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PromoController extends Controller {

        /**
         * @Route("/promos/list/{page}", name="promos_list", defaults={"page":1})
         */
        public function indexAction(Request $request) {
                $page = $request->get('page');
                $manager = $this->getManager();

                $pager = $manager->getPagination($page);

                $params = array(
                    'pager' => $pager
                );

                return $this->render('promos/list.html.twig', $params);
        }

        /**
         * @Route("/promos/new", name="promos_new")
         */
        public function newAction(Request $request) {
                $manager = $this->getManager();

                $form = $this->createForm(new PromoType(), new Promo());
                $form->handleRequest($request);

                if ($form->isValid()) {
                        $data = $form->getData();
                        
                        $promo = $manager->savePromo($data);

                        $this->addFlash('form', 'Promo creada con exito');
                        return $this->redirectToRoute('promos_edit', array('id' => $promo->getId()));
                }

                $params = array(
                    'form' => $form->createView()
                );

                return $this->render('promos/new.html.twig', $params);
        }

        /**
         * @Route("/promos/edit/{id}", name="promos_edit")
         */
        public function editAction($id, Request $request) {
                $manager = $this->getManager();
                $promo = $manager->getPromo($id);

                $form = $this->createForm(new PromoType(), $promo);

                $form->handleRequest($request);
                if ($form->isValid()) {
                        $promo = $form->getData();
                        
                        $manager->savePromo($promo);

                        $this->addFlash('form', 'Promo actualizada con exito');

                        return $this->redirectToRoute('promos_edit', array('id' => $id));
                }

                $params = array(
                    'form' => $form->createView(),
                );

                return $this->render('promos/edit.html.twig', $params);
        }

        /**
         * @Route("/promos/delete/{id}", name="promos_delete")
         */
        public function deleteAction($id, Request $request) {
                $manager = $this->getManager();
                
                $promo = $manager->getPromo($id);

                if (!empty($promo)) {
                        $manager->deletePromo($promo);
                }
                return $this->redirect($this->generateUrl('promos_list'));
        }

        private function getManager() {
                return $this->container->get('app.promos.manager');
        }

}
