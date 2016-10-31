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

/**
 * Class VolumesAwareTrait
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\DockerBundle\Compose\Service\Traits
 */
trait VolumesAwareTrait
{
    /**
     * @var array
     */
    protected $volumes;

    /**
     * @return array
     */
    public function getVolumes()
    {
        return $this->volumes;
    }

    /**
     * @param array $volumes
     * @return self
     */
    public function setVolumes(array $volumes)
    {
        $this->volumes = $volumes;
        return $this;
    }

    /**
     * @param array $serialized
     */
    public function applyVolumes(array &$serialized)
    {
        $serialized[$this->getName()]['volumes'] = $this->volumes;
    }
}
