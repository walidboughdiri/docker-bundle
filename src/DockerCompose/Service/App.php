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

use Drgomesp\DockerBundle\DockerCompose\Service\Composition\VolumesAwareInterface;
use Drgomesp\DockerBundle\DockerCompose\Service\Traits\ServiceTrait;
use Drgomesp\DockerBundle\DockerCompose\Service\Traits\VolumesAwareTrait;
use Drgomesp\DockerBundle\DockerCompose\ServiceInterface;

/**
 * Represents the application service which contains the code.
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\DockerCompose\Service
 */
class App implements ServiceInterface, VolumesAwareInterface
{
    use ServiceTrait, VolumesAwareTrait;
}
