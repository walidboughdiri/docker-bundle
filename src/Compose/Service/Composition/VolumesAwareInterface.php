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
 * Interface VolumesAwareInterface
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\Compose\Service
 */
interface VolumesAwareInterface
{
    /**
     * @return array
     */
    public function getVolumes();

    /**
     * @param array $volumes
     * @return ServiceInterface
     */
    public function setVolumes(array $volumes);
}
