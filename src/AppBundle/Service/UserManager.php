<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Doctrine\UserManager as FOSUserManager;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

/**
 * Description of UserManager
 *
 * @author jmpantoja
 */
class UserManager {

        /**
         *
         * @var EntityManager
         */
        private $doctrine;

        /**
         *
         * @var FOSUserManager
         */
        private $manager;

        /**
         *
         * @var EncoderFactory
         */
        private $encoder;

        public function __construct(EntityManager $doctrine, FOSUserManager $manager, EncoderFactory $encoder) {

                $this->setDoctrine($doctrine);
                $this->setManager($manager);
                $this->setEncoder($encoder);
        }

        public function getDoctrine() {
                return $this->doctrine;
        }

        public function setDoctrine(EntityManager $doctrine) {
                $this->doctrine = $doctrine;
                return $this;
        }

        public function getManager() {
                return $this->manager;
        }

        public function setManager(FOSUserManager $manager) {
                $this->manager = $manager;
                return $this;
        }

        public function getEncoder() {
                return $this->encoder;
        }

        public function setEncoder(EncoderFactory $encoder) {
                $this->encoder = $encoder;
                return $this;
        }

        public function getPagination($page) {

                $doctrine = $this->getDoctrine();

                $queryBuilder = $doctrine->createQueryBuilder()
                        ->select('u')
                        ->from('AppBundle:User', 'u');


                $adapter = new DoctrineORMAdapter($queryBuilder);

                $pager = new Pagerfanta($adapter);
                $pager->setCurrentPage($page);
                return $pager;
        }

        public function getUser($id) {

                $doctrine = $this->getDoctrine();
                $repository = $doctrine->getRepository('AppBundle:User');

                return $repository->find($id);
        }

        public function createUser(array $data) {
                $userManager = $this->getManager();
                $user = $userManager->createUser();
                $user->setUsername($data['username']);
                $user->setEmail($data['email']);
                $user->setPlainPassword($data['password']);
                $user->setEnabled(true);

                if (isset($data['rol'])) {
                        $user->setRol($data['rol']);
                }

                $userManager->updateUser($user);
                return $user;
        }

        public function updateUser(User $user) {
                $userManager = $this->getManager();
                return $userManager->updateUser($user, true);
        }

        public function changePassword(User $user, array $data) {
                $userManager = $this->getManager();

                if ($this->checkPassword($user, $data['current'])) {
                        $user->setPlainPassword($data['password']);
                        $userManager->updateUser($user, true);

                        return true;
                }
                return false;
        }

        public function checkPassword(User $user, $password) {
                $factory = $this->getEncoder();
                $encoder = $factory->getEncoder($user);

                return $encoder->isPasswordValid($user->getPassword(), $password, $user->getSalt());
        }

}
