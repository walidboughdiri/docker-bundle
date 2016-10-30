<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\Yaml\Traits;

use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlConvertibleTrait
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Drgomesp\DockerBundle\Yaml\Traits
 */
trait YamlConvertibleTrait
{
    /**
     * @return string
     */
    abstract public function jsonSerialize();

    /**
     * @return string
     */
    public function toYaml()
    {
        return Yaml::dump($this->jsonSerialize(), 3, 4, Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK);
    }
}
