<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\DockerCompose\Service;

use Drgomesp\DockerBundle\DockerCompose\Service\Composition\EnvironmentAwareInterface;
use Drgomesp\DockerBundle\DockerCompose\Service\Composition\PortsAwareInterface;
use Drgomesp\DockerBundle\DockerCompose\Service\Traits\EnvironmentAwareTrait;
use Drgomesp\DockerBundle\DockerCompose\Service\Traits\PortsAwareTrait;
use Drgomesp\DockerBundle\DockerCompose\Service\Traits\ServiceTrait;
use Drgomesp\DockerBundle\DockerCompose\ServiceInterface;

/**
 * Represents the nginx web server.
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\DockerCompose\Service
 */
class Nginx implements ServiceInterface, PortsAwareInterface, EnvironmentAwareInterface
{
    use ServiceTrait, PortsAwareTrait, EnvironmentAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'build' => $this->getBuildPath(),
            'environment' => $this->getEnvironment(),
            'ports' => $this->getPorts(),
        ];
    }
}
