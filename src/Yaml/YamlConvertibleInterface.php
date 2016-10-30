<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\Yaml;

/**
 * Interface YamlConvertableInterface
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Drgomesp\DockerBundle\Yaml
 */
interface YamlConvertibleInterface
{
    /**
     * Returns the Yaml representation as a string
     *
     * @return string
     */
    public function toYaml();
}
