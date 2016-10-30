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

use Drgomesp\DockerBundle\Compose\Service\Composition\VolumesAwareInterface;
use Drgomesp\DockerBundle\Compose\Service\Traits\ServiceTrait;
use Drgomesp\DockerBundle\Compose\Service\Traits\VolumesAwareTrait;
use Drgomesp\DockerBundle\Compose\ServiceInterface;
use Drgomesp\DockerBundle\Yaml\Traits\YamlConvertibleTrait;

/**
 * Represents the application service which contains the code.
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\Compose\Service
 */
class App implements ServiceInterface, VolumesAwareInterface
{
    use ServiceTrait, VolumesAwareTrait, YamlConvertibleTrait;
}
