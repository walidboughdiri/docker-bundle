<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\Compose\Service;

use Drgomesp\DockerBundle\Compose\Service\Composition\EnvironmentAwareInterface;
use Drgomesp\DockerBundle\Compose\Service\Composition\PortsAwareInterface;
use Drgomesp\DockerBundle\Compose\Service\Composition\VolumesFromAwareInterface;
use Drgomesp\DockerBundle\Compose\Service\Traits\EnvironmentAwareTrait;
use Drgomesp\DockerBundle\Compose\Service\Traits\PortsAwareTrait;
use Drgomesp\DockerBundle\Compose\Service\Traits\ServiceTrait;
use Drgomesp\DockerBundle\Compose\Service\Traits\VolumesAwareTrait;
use Drgomesp\DockerBundle\Compose\Service\Traits\VolumesFromAwareTrait;
use Drgomesp\DockerBundle\Compose\ServiceInterface;
use Drgomesp\DockerBundle\Yaml\Traits\YamlConvertibleTrait;
use Drgomesp\DockerBundle\Yaml\YamlConvertibleInterface;

/**
 * Represents the nginx web server.
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\Compose\Service
 */
class Nginx extends AbstractService implements
    PortsAwareInterface,
    EnvironmentAwareInterface,
    VolumesFromAwareInterface,
    YamlConvertibleInterface
{
    use PortsAwareTrait, EnvironmentAwareTrait, VolumesFromAwareTrait, YamlConvertibleTrait;

    /**
     * {@inheritdoc}
     */
    protected function applyDeeperJsonSerialize(array &$serialized)
    {
        $this->applyEnvironment($serialized);
        $this->applyPorts($serialized);
        $this->applyOriginVolumes($serialized);
    }
}
