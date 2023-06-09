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
        foreach ($container->getDefinitions() as $definition) {
            if (!$definition->hasTag(self::VALUE_OBJECT_TAG)) {
                continue;
            }
            $class = $definition->getClass();
            foreach ($definition->getTag(self::VALUE_OBJECT_TAG) as ['type' => $type]) {
                $types[$type] = $class;
            }
        }
        $container->setParameter('doctrine_value_object_types', $types);
    }
}
