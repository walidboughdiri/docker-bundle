<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\DockerCompose\Service;

use Drgomesp\DockerBundle\DockerCompose\Service\Composition\VolumesFromAwareInterface;
use Drgomesp\DockerBundle\DockerCompose\Service\Traits\ServiceTrait;
use Drgomesp\DockerBundle\DockerCompose\Service\Traits\VolumesFromAwareTrait;
use Drgomesp\DockerBundle\DockerCompose\ServiceInterface;

/**
 * Represents the php 5.6 service that contains php and php-fpm.
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\DockerCompose\Service
 */
class Php56 implements ServiceInterface, VolumesFromAwareInterface
{
    use ServiceTrait, VolumesFromAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'build' => $this->getBuildPath(),
            'volumes_from' => $this->getOriginVolumes(),
        ];
    }
}
