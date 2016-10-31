<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\Compose\Service;

use Drgomesp\DockerBundle\Compose\Service\Composition\VolumesFromAwareInterface;
use Drgomesp\DockerBundle\Compose\Service\Traits\ServiceTrait;
use Drgomesp\DockerBundle\Compose\Service\Traits\VolumesFromAwareTrait;
use Drgomesp\DockerBundle\Compose\ServiceInterface;
use Drgomesp\DockerBundle\Yaml\Traits\YamlConvertibleTrait;
use Drgomesp\DockerBundle\Yaml\YamlConvertibleInterface;

/**
 * Represents the php 5.6 service that contains php and php-fpm.
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\Compose\Service
 */
class Php56 extends AbstractService implements VolumesFromAwareInterface, YamlConvertibleInterface
{
    use VolumesFromAwareTrait, YamlConvertibleTrait;

    /**
     * {@inheritdoc}
     */
    protected function applyDeeperJsonSerialize(array &$serialized)
    {
        $this->applyOriginVolumes($serialized);
    }
}
