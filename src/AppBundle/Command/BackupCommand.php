<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BackupCommand extends ContainerAwareCommand {

        protected function configure() {
                $this
                        ->setName('mediasat:backup')
                        ->setDescription('Hace una copia de seguridad')
                ;
        }

        protected function execute(InputInterface $input, OutputInterface $output) {
                $backup = $this->getContainer()->get('app.backup.manager');
                
                $result = $backup->run();
                $output->writeln($result);
        }

}
