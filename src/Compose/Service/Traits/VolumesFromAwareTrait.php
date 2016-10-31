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

use Drgomesp\DockerBundle\Compose\ServiceInterface;

/**
 * Class VolumesFromAwareTrait
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Drgomesp\DockerBundle\Compose\Service
 */
trait VolumesFromAwareTrait
{
    /**
     * @var ServiceInterface[]
     */
    protected $originVolumes;

    /**
     * @param ServiceInterface $service
     * @return self
     */
    public function addOriginVolume(ServiceInterface $service)
    {
        $this->originVolumes[] = $service;
        return $this;
    }

    /**
     * @return \Drgomesp\DockerBundle\Compose\ServiceInterface[]
     */
    public function getOriginVolumes()
    {
        return $this->originVolumes;
    }

    /**
     * @param array $serialized
     */
    public function applyOriginVolumes(array &$serialized)
    {
        $serialized[$this->getName()]['volumes_from'] = array_map(function (ServiceInterface $service) {
            return $service->getName();
        }, $this->originVolumes);
    }
}
