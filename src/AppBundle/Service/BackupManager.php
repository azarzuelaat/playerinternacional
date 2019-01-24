<?php

namespace AppBundle\Service;

use AppBundle\Entity\Info;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Description of LegalManager
 *
 * @author jmpantoja
 */
class BackupManager {

        /**
         *
         * @var TwigEngine
         */
        private $twig;
        private $backupDir;
        private $databasePath;
        private $promosPath;

        public function __construct(TwigEngine $twig, array $paths) {
                $this->setTwig($twig);
                $this->setBackupDir($paths['backupDir']);
                $this->setDatabasePath($paths['databasePath']);
                $this->setPromosPath($paths['promosPath']);
        }

        public function getTwig() {
                return $this->twig;
        }

        public function getBackupDir() {
                return $this->backupDir;
        }

        public function getDatabasePath() {
                return $this->databasePath;
        }

        public function getPromosPath() {
                return $this->promosPath;
        }

        public function setTwig(TwigEngine $twig) {
                $this->twig = $twig;
                return $this;
        }

        public function setBackupDir($backupDir) {
                $this->backupDir = $backupDir;
                return $this;
        }

        public function setDatabasePath($databasePath) {
                $this->databasePath = $databasePath;
                return $this;
        }

        public function setPromosPath($promosPath) {
                $this->promosPath = $promosPath;
                return $this;
        }

        public function saveLegalVersion(array $items, Info $info) {
                $twig = $this->getTwig();

                $params = array(
                    'items' => $items,
                    'info' => $info
                );

                $filename = $this->getBackupDir() . '/legal/' . date('YmdHis') . '.html';
                $content = $twig->render('legal/index.html.twig', $params);

                $fs = new Filesystem();
                $fs->dumpFile($filename, $content);
                
        }

        public function run() {
                $result = array(
                    $this->copyDatabase(),
                    $this->copyPromos(),
                );

                return implode("\n", $result);
        }

        private function copyDatabase() {
                $fs = new Filesystem();
                $source = $this->getDatabasePath();
                $target = $this->getBackupDir() . '/data/' . date('YmdHis') . '-' . basename($source);

                $fs->copy($source, $target);

                return "copy $source --> $target";
        }

        private function copyPromos() {
                $fs = new Filesystem();
                $source = $this->getPromosPath();
                $target = $this->getBackupDir() . '/promos/';

                $fs->mirror($source, $target);

                return "copy $source --> $target";
        }

}
