<?php

namespace Drgomesp\DockerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Class ComposeUpCommand
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package SymfonyDocker\DockerBundle\Command
 */
class DockerComposeUpCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('docker:compose:up')
            ->setDescription('Starts all containers with Docker Compose')
            ->setHelp(<<<'EOF'
The <info>%command.name%</info> command clears the application cache for a given environment
and debug mode:

  <info>php %command.full_name% --env=dev</info>
  <info>php %command.full_name% --env=prod --no-debug</info>
EOF
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Kernel $kernel */
        $kernel = $this->getContainer()->get('kernel');
        $dockerComposeFile = $kernel->locateResource('@SymfonyDockerBundle/Resources/config/docker/docker-compose.yml');

        $output->writeln(shell_exec("docker-compose -f {$dockerComposeFile} up -d --remove-orphans"));
    }
}
