<?php
declare(strict_types=1);

namespace Upscale\DoctrineValueObjectBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Upscale\DoctrineValueObjectBundle\Attribute\ValueObject;

class DoctrineValueObjectExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configDir = new FileLocator(__DIR__ . '/../../config');
        $loader = new YamlFileLoader($container, $configDir);
        $loader->load('services.yaml');

        $container->registerAttributeForAutoconfiguration(
            ValueObject::class,
            static function (ChildDefinition $definition, ValueObject $attribute, \ReflectionClass $class): void {
                $definition->setShared(false);
                $definition->addTag(DoctrineValueObjectPass::VALUE_OBJECT_TAG, [
                    'type' => $attribute->type ?: Container::underscore($class->getShortName()),
                    'class' => $class->getName(),
                ]);
            }
        );
    }
}
