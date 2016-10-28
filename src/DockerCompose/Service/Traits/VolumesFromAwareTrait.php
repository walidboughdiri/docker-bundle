<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\DockerCompose\Service\Traits;
use Drgomesp\DockerBundle\DockerCompose\ServiceInterface;

/**
 * Class VolumesFromAwareTrait
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\DockerBundle\DockerCompose\Service
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
     * @return \Drgomesp\DockerBundle\DockerCompose\ServiceInterface[]
     */
    public function getOriginVolumes()
    {
        return $this->originVolumes;
    }
}
