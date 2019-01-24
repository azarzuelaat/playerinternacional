<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="info")
 */
class Info {

        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;

        /**
         * @ORM\Column(type="string")
         */
        private $title;

        /**
         * @ORM\Column(type="string",  nullable=true)
         */
        private $linkHref;

        /**
         * @ORM\Column(type="string",  nullable=true)
         */
        private $linkAnchor;

        public function getId() {
                return $this->id;
        }

        public function getTitle() {
                return $this->title;
        }

        public function getLinkHref() {
                return $this->linkHref;
        }

        public function getLinkAnchor() {
                return $this->linkAnchor;
        }

        public function setId($id) {
                $this->id = $id;
                return $this;
        }

        public function setTitle($title) {
                $this->title = $title;
                return $this;
        }

        public function setLinkHref($linkHref) {
                $this->linkHref = $linkHref;
                return $this;
        }

        public function setLinkAnchor($linkAnchor) {
                $this->linkAnchor = $linkAnchor;
                return $this;
        }

}
