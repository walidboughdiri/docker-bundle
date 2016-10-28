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

/**
 * Class PortsAwareTrait
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\DockerBundle\DockerCompose\Service\Traits
 */
trait PortsAwareTrait
{
    /**
     * @var array
     */
    protected $ports;

    /**
     * @return array
     */
    public function getPorts()
    {
        return $this->ports;
    }

    /**
     * @param array $ports
     * @return ServiceInterface
     */
    public function setPorts(array $ports)
    {
        $this->ports = $ports;
        return $this;
    }
}
