<?php

namespace Upscale\DoctrineValueObjectBundle\Attribute;

#[\Attribute(\Attribute::TARGET_CLASS)]
final class ValueObject
{
    public function __construct(public readonly ?string $type = null)
    {
    }
}
