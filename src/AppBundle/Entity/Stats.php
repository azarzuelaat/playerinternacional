<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="stats")
 */
class Stats {

        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;

        /**
         * @ORM\Column(type="integer")
         */
        protected $user;

        /**
         * @ORM\Column(type="integer")
         */
        protected $promo;

        /**
         * @ORM\Column(type="datetime")
         */
        protected $date;

        public function getId() {
                return $this->id;
        }

        public function getUser() {
                return $this->user;
        }

        public function getPromo() {
                return $this->promo;
        }

        public function getDate() {
                return $this->date;
        }

        public function setId($id) {
                $this->id = $id;
                return $this;
        }

        public function setUser($user) {
                $this->user = $user;
                return $this;
        }

        public function setPromo($promo) {
                $this->promo = $promo;
                return $this;
        }

        public function setDate(DateTime $date) {
                $this->date = $date;
                return $this;
        }

}
