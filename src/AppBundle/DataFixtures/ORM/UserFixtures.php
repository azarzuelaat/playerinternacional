<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Promo;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserFixtures
 *
 * @author jose
 */
class UserFixtures implements FixtureInterface, ContainerAwareInterface {

        private $container;

        public function setContainer(ContainerInterface $container = null) {
                $this->container = $container;
        }

        public function load(ObjectManager $manager) {

                $userManager = $this->container->get('fos_user.user_manager');
                $user = $userManager->createUser();
                $user->setUsername('admin');
                $user->setEmail("admin@mediasat.com");
                $user->setPlainPassword('SymbIWdR');
                //$user->setPlainPassword('admin');
                $user->setEnabled(true);
                $user->addRole('ROLE_ADMIN');
                $userManager->updateUser($user);


                $user = $userManager->createUser();
                $user->setUsername('root');
                $user->setEmail("super@mediasat.com");
                $user->setPlainPassword('ep8SJnuV');
                $user->setEnabled(true);
                $user->addRole('ROLE_SUPERADMIN');
                $userManager->updateUser($user);
        }

}
