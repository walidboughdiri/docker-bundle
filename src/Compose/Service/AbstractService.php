<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\Compose\Service;

use Drgomesp\DockerBundle\Compose\ServiceInterface;

/**
 * Class AbstractService
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Drgomesp\DockerBundle\Compose\Service
 */
abstract class AbstractService implements ServiceInterface
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
     * @param array $serialized
     * @return array
     */
    abstract protected function applyDeeperJsonSerialize(array &$serialized);

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        if (!$this instanceof ServiceInterface) {
            return;
        }

        $serialized = [
            $this->getName() => [
                'build' => $this->getBuildPath(),
            ],
        ];

        $this->applyDeeperJsonSerialize($serialized);
        return $serialized;
    }
}
