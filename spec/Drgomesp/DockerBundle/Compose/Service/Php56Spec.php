<?php

namespace spec\Drgomesp\DockerBundle\Compose\Service;

use Drgomesp\DockerBundle\Compose\Service\App;
use PhpSpec\ObjectBehavior;

class Php56Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Drgomesp\DockerBundle\Compose\Service\Php56');
        $this->shouldImplement('Drgomesp\DockerBundle\Compose\ServiceInterface');
        $this->shouldImplement('Drgomesp\DockerBundle\Compose\ServiceInterface');
    }

    public function it_can_be_created_through_a_fluent_interface()
    {
        $this->setName('app')->shouldReturn($this);
        $this->setBuildPath('./app')->shouldReturn($this);
        $this->addOriginVolume(new App())->shouldReturn($this);
    }

    public function it_can_be_serialized_to_json()
    {
        $this->shouldImplement('\JsonSerializable');

        $this
            ->setName('name')
            ->setBuildPath('./some/path')
            ->addOriginVolume((new App)->setName('app'))
        ;

        $this->jsonSerialize()->shouldReturn([
            'name' => [
                'build' => './some/path',
                'volumes_from' => ['app'],
            ],
        ]);
    }

    public function it_can_be_converted_into_yaml_format()
    {
        $this->shouldImplement('Drgomesp\DockerBundle\Yaml\YamlConvertibleInterface');

        $app = new App();
        $app->setName('app');

        $this
            ->setName('php56')
            ->setBuildPath('./some/path')
            ->addOriginVolume($app)
        ;

        $yaml = <<<END
php56:
    build: ./some/path
    volumes_from:
        - app

END;

        $this->toYaml()->shouldBe($yaml);
    }
}
