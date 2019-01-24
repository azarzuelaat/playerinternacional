<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="legal")
 */
class Legal {

        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;

        /**
         * @ORM\Column(type="integer")
         */
        private $number;

        /**
         * @ORM\Column(type="string")
         */
        private $name;

        /**
         * @ORM\Column(type="text")
         */
        private $text;

        public function getId() {
                return $this->id;
        }

        public function getNumber() {
                return $this->number;
        }

        public function getName() {
                return $this->name;
        }

        public function getText() {
                return $this->text;
        }

        public function setId($id) {
                $this->id = $id;
                return $this;
        }

        public function setNumber($number) {
                $this->number = $number;
                return $this;
        }

        public function setName($name) {
                $this->name = $name;
                return $this;
        }

        public function setText($text) {
                $this->text = $text;
                return $this;
        }

}
