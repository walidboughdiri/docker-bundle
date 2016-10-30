<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\Compose;

/**
 * Class ComposeFileBuilder
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\DockerBundle\Compose
 */
class ComposeFileBuilder
{
    /**
     * @var ServiceInterface[]
     */
    protected $services;

    /**
     * @return ServiceInterface[]
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param ServiceInterface $service
     */
    public function addService(ServiceInterface $service)
    {
        $this->services[] = $service;
    }

    /**
     * @param ServiceInterface[] $services
     */
    public function setServices(array $services)
    {
        $this->services = $services;
    }


}
