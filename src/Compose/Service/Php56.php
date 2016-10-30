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

/**
 * Represents the php 5.6 service that contains php and php-fpm.
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\Compose\Service
 */
class Php56 implements ServiceInterface, VolumesFromAwareInterface
{
    use ServiceTrait, VolumesFromAwareTrait, YamlConvertibleTrait;
}
