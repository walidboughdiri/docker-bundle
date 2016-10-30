<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\Compose\Service\Traits;

use Drgomesp\DockerBundle\Compose\Service\Composition\EnvironmentAwareInterface;
use Drgomesp\DockerBundle\Compose\Service\Composition\PortsAwareInterface;
use Drgomesp\DockerBundle\Compose\Service\Composition\VolumesAwareInterface;
use Drgomesp\DockerBundle\Compose\Service\Composition\VolumesFromAwareInterface;
use Drgomesp\DockerBundle\Compose\ServiceInterface;

/**
 * Class ServiceTrait
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\DockerBundle\Compose\Service\Traits
 */
trait ServiceTrait
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $buildPath;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuildPath()
    {
        return $this->buildPath;
    }

    /**
     * @param string $buildPath
     * @return self
     */
    public function setBuildPath($buildPath)
    {
        $this->buildPath = $buildPath;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        $serialized = [
            $this->getName() => [
                'build' => $this->getBuildPath(),
            ],
        ];

        if ($this instanceof EnvironmentAwareInterface) {
            $serialized[$this->getName()]['environment'] = $this->getEnvironment();
        }

        if ($this instanceof PortsAwareInterface) {
            $serialized[$this->getName()]['ports'] = $this->getPorts();
        }

        if ($this instanceof VolumesAwareInterface) {
            $serialized[$this->getName()]['volumes'] = $this->getVolumes();
        }

        if ($this instanceof VolumesFromAwareInterface) {
            $serialized[$this->getName()]['volumes_from'] = array_map(function (ServiceInterface $service) {
                return $service->getName();
            }, $this->getOriginVolumes());
        }

        return $serialized;
    }
}
