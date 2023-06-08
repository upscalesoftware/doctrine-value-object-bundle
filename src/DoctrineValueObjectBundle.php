<?php

namespace Upscale\DoctrineValueObjectBundle;

use Doctrine\DBAL\Types\Type;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Upscale\DoctrineValueObjectBundle\DependencyInjection\DoctrineValueObjectPass;
use Yokai\DoctrineValueObject\Doctrine\Types;

class DoctrineValueObjectBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new DoctrineValueObjectPass());
    }

    public function boot(): void
    {
        $types = $this->container->get(Types::class);
        $types->register(Type::getTypeRegistry());
    }
}
