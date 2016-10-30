<?php

namespace spec\Drgomesp\DockerBundle\Compose\Service;

use Drgomesp\DockerBundle\Compose\Service\App;
use PhpSpec\ObjectBehavior;

class NginxSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Drgomesp\DockerBundle\Compose\Service\Nginx');
        $this->shouldImplement('Drgomesp\DockerBundle\Compose\ServiceInterface');
        $this->shouldImplement('Drgomesp\DockerBundle\Compose\Service\Composition\VolumesFromAwareInterface');
    }

    public function it_can_be_created_through_a_fluent_interface()
    {
        $this->setName('app')->shouldReturn($this);
        $this->setBuildPath('./app')->shouldReturn($this);
        $this->setEnvironment(['NGINX_PORT' => 80])->shouldReturn($this);
        $this->setPorts([8080 => 80])->shouldReturn($this);
    }

    public function it_can_be_serialized_to_json()
    {
        $this->shouldImplement('\JsonSerializable');

        $this
            ->setName('name')
            ->setBuildPath('./some/path')
            ->setEnvironment(['NGINX_PORT=80'])
            ->setPorts([8080 => 80])
            ->addOriginVolume((new App)->setName('app'))
        ;

        $this->jsonSerialize()->shouldReturn([
            'name' => [
                'build' => './some/path',
                'environment' => ['NGINX_PORT=80'],
                'ports' => [8080 => 80],
                'volumes_from' => ['app'],
            ],
        ]);
    }

    public function it_can_be_converted_into_yaml_format()
    {
        $this->shouldImplement('Drgomesp\DockerBundle\Yaml\YamlConvertibleInterface');

        $this
            ->setName('web')
            ->setBuildPath('./some/path')
            ->setEnvironment(['NGINX_PORT=80'])
            ->setPorts(['8080:80'])
            ->addOriginVolume((new App)->setName('app'))
        ;

        $yaml = <<<END
web:
    build: ./some/path
    environment:
        - NGINX_PORT=80
    ports:
        - '8080:80'
    volumes_from:
        - app

END;

        $this->toYaml()->shouldBe($yaml);
    }
}
