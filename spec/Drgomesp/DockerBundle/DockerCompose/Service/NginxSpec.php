<?php

namespace spec\Drgomesp\DockerBundle\DockerCompose\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NginxSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Drgomesp\DockerBundle\DockerCompose\Service\Nginx');
        $this->shouldImplement('Drgomesp\DockerBundle\DockerCompose\ServiceInterface');
    }

    function it_can_be_created_through_a_fluent_interface()
    {
        $this->setName('app')->shouldReturn($this);
        $this->setBuildPath('./app')->shouldReturn($this);
        $this->setEnvironment(['NGINX_PORT' => 80])->shouldReturn($this);
        $this->setPorts([8080 => 80])->shouldReturn($this);
    }

    function it_can_be_serialized_to_json()
    {
        $this->shouldImplement('\JsonSerializable');

        $this
            ->setName('name')
            ->setBuildPath('./some/path')
            ->setEnvironment(['NGINX_PORT' => 80])
            ->setPorts([8080 => 80])
        ;

        $this->jsonSerialize()->shouldReturn([
            'name' => 'name',
            'build' => './some/path',
            'environment' => ['NGINX_PORT' => 80],
            'ports' => [8080 => 80],
        ]);
    }
}
