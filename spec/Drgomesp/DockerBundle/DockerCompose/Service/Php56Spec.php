<?php

namespace spec\Drgomesp\DockerBundle\DockerCompose\Service;

use Drgomesp\DockerBundle\DockerCompose\Service\App;
use PhpSpec\ObjectBehavior;

class Php56Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Drgomesp\DockerBundle\DockerCompose\Service\Php56');
        $this->shouldImplement('Drgomesp\DockerBundle\DockerCompose\ServiceInterface');
    }

    function it_can_be_created_through_a_fluent_interface()
    {
        $this->setName('app')->shouldReturn($this);
        $this->setBuildPath('./app')->shouldReturn($this);
        $this->addOriginVolume(new App())->shouldReturn($this);
    }

    function it_can_be_serialized_to_json()
    {
        $this->shouldImplement('\JsonSerializable');

        $this
            ->setName('name')
            ->setBuildPath('./some/path')
            ->addOriginVolume($app = new App())
        ;

        $this->jsonSerialize()->shouldReturn([
            'name' => 'name',
            'build' => './some/path',
            'volumes_from' => [$app],
        ]);
    }
}
