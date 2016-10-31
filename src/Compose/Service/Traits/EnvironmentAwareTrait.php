<?php

/*
 * This file is part of the docker-bundle-example package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drgomesp\DockerBundle\Compose\Service\Traits;

/**
 * Class EnvironmentAwareTrait
 *
 * @author Daniel Ribeiro <daniel.ribeiro@propertyfinder.ae>
 * @package Drgomesp\DockerBundle\Compose\Service\Traits
 */
trait EnvironmentAwareTrait
{
    /**
     * @var array
     */
    protected $environment;

    /**
     * @return array
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param array $environment
     * @return ServiceInterface
     */
    public function setEnvironment(array $environment)
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * @param array $serialized
     */
    public function applyEnvironment(array &$serialized)
    {
        $serialized[$this->getName()]['environment'] = $this->environment;
    }
}
