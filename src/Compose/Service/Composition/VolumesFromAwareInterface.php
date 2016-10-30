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
 * Interface VolumesFromAwareInterface
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\Compose\Service
 */
interface VolumesFromAwareInterface
{
    /**
     * The services from which the service volumes from as a key/value array
     *
     * @return \Drgomesp\DockerBundle\Compose\ServiceInterface[]
     */
    public function getOriginVolumes();
}
