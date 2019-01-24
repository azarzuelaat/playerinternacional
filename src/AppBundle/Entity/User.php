<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;

        public function __construct() {
                parent::__construct();
                $this->enabled = true;
        }

        public function getRol() {
                $roles = $this->getRoles();
                $rol = array_shift($roles);

                return $rol;
        }

        public function getRolName() {
                $rol = $this->getRol();
                $name = str_replace('ROLE_', '', $rol);

                return $name;
        }

        public function setRol($role) {
                $this->setRoles(array($role));

                return $this;
        }

}
