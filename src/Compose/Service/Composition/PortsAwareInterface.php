<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\Compose\Service\Composition;

/**
 * Interface PortsAwareInterface
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\Compose\Service
 */
interface PortsAwareInterface
{
    /**
     * The service exposed ports as a key/value array
     *
     * @return array
     */
    public function getPorts();

    /**
     * @param array $ports
     * @return ServiceInterface
     */
    public function setPorts(array $ports);
}
