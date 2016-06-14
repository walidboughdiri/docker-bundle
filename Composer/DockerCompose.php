<?php

/*
 * This file is part of the 02-docker-phppm package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SymfonyDocker\DockerBundle\Composer;

final class DockerCompose
{
    public static function createSymbolicLink()
    {
        shell_exec("ln -s vendor/symfony-docker/docker-bundle/Resources/config/docker/docker-compose.yml docker-compose.yml");
    }
}