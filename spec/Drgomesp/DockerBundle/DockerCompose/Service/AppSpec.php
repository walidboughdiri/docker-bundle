<?php

namespace spec\Drgomesp\DockerBundle\DockerCompose\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AppSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Drgomesp\DockerBundle\DockerCompose\Service\App');
        $this->shouldImplement('Drgomesp\DockerBundle\DockerCompose\ServiceInterface');
    }

    function it_can_be_created_through_a_fluent_interface()
    {
        $this->setName('app')->shouldReturn($this);
        $this->setBuildPath('./app')->shouldReturn($this);
        $this->setVolumes(['../../../' => './app'])->shouldReturn($this);
    }

    function it_can_be_serialized_to_json()
    {
        $this->shouldImplement('\JsonSerializable');

        $this
            ->setName('name')
            ->setBuildPath('./some/path')
            ->setVolumes(['../' => './foo'])
        ;

        $this->jsonSerialize()->shouldReturn([
            'name' => 'name',
            'build' => './some/path',
            'volumes' => ['../' => './foo'],
        ]);
    }
}
