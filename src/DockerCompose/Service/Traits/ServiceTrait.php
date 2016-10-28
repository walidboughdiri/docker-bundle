<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\DockerCompose\Service\Traits;

/**
 * Class ServiceTrait
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\DockerBundle\DockerCompose\Service\Traits
 */
trait ServiceTrait
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $buildPath;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuildPath()
    {
        return $this->buildPath;
    }

    /**
     * @param string $buildPath
     * @return self
     */
    public function setBuildPath($buildPath)
    {
        $this->buildPath = $buildPath;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'build' => $this->getBuildPath(),
            'volumes' => $this->getVolumes(),
        ];
    }
}
