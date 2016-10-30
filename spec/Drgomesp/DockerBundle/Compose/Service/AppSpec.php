<?php

namespace spec\Drgomesp\DockerBundle\Compose\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AppSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Drgomesp\DockerBundle\Compose\Service\App');
        $this->shouldImplement('Drgomesp\DockerBundle\Compose\ServiceInterface');
    }

    public function it_can_be_created_through_a_fluent_interface()
    {
        $this->setName('app')->shouldReturn($this);
        $this->setBuildPath('./app')->shouldReturn($this);
        $this->setVolumes(['../../../:./app'])->shouldReturn($this);
    }

    public function it_can_be_serialized_to_json()
    {
        $this->shouldImplement('\JsonSerializable');

        $this
            ->setName('name')
            ->setBuildPath('./some/path')
            ->setVolumes(['../:./foo'])
        ;

        $this->jsonSerialize()->shouldReturn([
            'name' => [
                'build' => './some/path',
                'volumes' => ['../:./foo'],
            ]
        ]);
    }

    public function it_can_be_converted_into_yaml_format()
    {
        $this->shouldImplement('Drgomesp\DockerBundle\Yaml\YamlConvertibleInterface');

        $this
            ->setName('name')
            ->setBuildPath('./some/path')
            ->setVolumes(['../:./foo'])
        ;

        $yaml = <<<END
name:
    build: ./some/path
    volumes:
        - '../:./foo'

END;

        $this->toYaml()->shouldContain($yaml);
    }
}
