<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\Compose;

use Drgomesp\DockerBundle\Yaml\YamlConvertibleInterface;

/**
 * Interface ServiceInterface
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Drgomesp\Compose
 */
interface ServiceInterface extends \JsonSerializable, YamlConvertibleInterface
{
    /**
     * @return array
     */
    public function getName();

    /**
     * @param array $name
     * @return ServiceInterface
     */
    public function setName($name);

    /**
     * @return array
     */
    public function getBuildPath();

    /**
     * @param array $buildPath
     * @return ServiceInterface
     */
    public function setBuildPath($buildPath);
}
