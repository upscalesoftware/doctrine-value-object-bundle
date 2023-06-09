<?php
declare(strict_types=1);

namespace Upscale\DoctrineValueObjectBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DoctrineValueObjectPass implements CompilerPassInterface
{
    public const VALUE_OBJECT_TAG = 'doctrine_value_object';

    public function process(ContainerBuilder $container): void
    {
        $types = [];
        foreach ($container->findTaggedServiceIds(self::VALUE_OBJECT_TAG, true) as $tags) {
            foreach ($tags as ['type' => $type, 'class' => $class]) {
                $types[$type] = $class;
            }
        }
        $container->setParameter('doctrine_value_object_types', $types);
    }
}
