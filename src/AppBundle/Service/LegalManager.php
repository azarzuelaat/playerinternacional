<?php

namespace AppBundle\Service;

use AppBundle\Entity\Info;
use AppBundle\Entity\Legal;
use Doctrine\ORM\EntityManager;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * Description of LegalManager
 *
 * @author jmpantoja
 */
class LegalManager {

        const INFO_LEGAL_TITLE = 1;

        /**
         *
         * @var EntityManager
         */
        private $doctrine;
        
        /**
         *
         * @var BackupManager 
         */
        private $backup;

        public function __construct(EntityManager $doctrine, BackupManager $backup) {
                $this->setDoctrine($doctrine);
                $this->setBackup($backup);
        }

        public function getDoctrine() {
                return $this->doctrine;
        }

        public function setDoctrine(EntityManager $doctrine) {
                $this->doctrine = $doctrine;
                return $this;
        }
        
        public function getBackup() {
                return $this->backup;
        }

        public function setBackup(BackupManager $backup) {
                $this->backup = $backup;
                return $this;
        }

        
        public function getPagination($page) {

                $doctrine = $this->getDoctrine();

                $queryBuilder = $doctrine->createQueryBuilder()
                        ->select('l')
                        ->from('AppBundle:Legal', 'l')
                        ->orderBy('l.number');


                $adapter = new DoctrineORMAdapter($queryBuilder);

                $pager = new Pagerfanta($adapter);
                $pager->setCurrentPage($page);
                $pager->setMaxPerPage(15);
                return $pager;
        }

        public function getLegal($id) {
                $doctrine = $this->getDoctrine();

                $legal = $doctrine->getRepository('AppBundle:Legal')->find($id);
                return $legal;
        }

        public function saveLegal(Legal $legal) {
                $doctrine = $this->getDoctrine();
                $doctrine->persist($legal);
                $doctrine->flush();

                $this->backup();
                return $legal;
        }

        public function deleteLegal(Legal $legal) {
                $doctrine = $this->getDoctrine();
                $doctrine->remove($legal);
                $doctrine->flush();

                $this->backup();
                return $legal;
        }

        public function getAllItems() {
                $doctrine = $this->getDoctrine();

                $query = $doctrine->createQueryBuilder()
                        ->select('l')
                        ->from('AppBundle:Legal', 'l')
                        ->orderBy('l.number')
                        ->getQuery();

                return $query->execute();
        }

        public function getInfo() {
                $doctrine = $this->getDoctrine();

                $info = $doctrine->getRepository('AppBundle:Info')->find(self::INFO_LEGAL_TITLE);
                if (is_null($info)) {
                        $info = new Info();
                }
                return $info;
        }

        public function saveInfo(Info $info) {
                $doctrine = $this->getDoctrine();
                $doctrine->persist($info);
                $doctrine->flush();

                $this->backup();
                return $info;
        }

        private function backup() {
                $items = $this->getAllItems();
                $info = $this->getInfo();                
                $this->backup->saveLegalVersion($items, $info);
        }

}
