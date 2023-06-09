Symfony Bundle for Doctrine Value Object
========================================

This package wraps [yokai/doctrine-value-object](https://github.com/yokai-php/doctrine-value-object) in a bundle to simplify its use in Symfony projects.

**Features:**
- Zero config setup
- Attribute annotation

## Installation

Install via [Composer](https://getcomposer.org/) as a dependency:
```bash
composer require upscale/doctrine-value-object-bundle
```

## Usage

### Attribute Annotation

Register a value object using an attribute annotation (available since PHP 8):

```php
use Upscale\DoctrineValueObjectBundle\Attribute\ValueObject;
use Yokai\DoctrineValueObject\StringValueObject;

#[ValueObject]
class PhoneNumber implements StringValueObject {...}
```

Reference the value object type by an underscore separated short class name:
```php
#[Entity]
class Person
{
    #[Column(type: 'phone_number')]
    private PhoneNumber $phone;
    
    // ...
}
```

### Type Naming

You can customize the type name, including use a fully-qualified class name, for example:
```php
#[ValueObject(type: PhoneNumber::class)]
class PhoneNumber implements StringValueObject {...}
```

```php
#[Entity]
class Person
{
    #[Column(type: PhoneNumber::class)]
    private PhoneNumber $phone;
    
    // ...
}
```

## Contributing

Pull Requests with fixes and improvements are welcome!

## License

Copyright © Upscale Software. All rights reserved.

Licensed under the [Apache License, Version 2.0](https://github.com/upscalesoftware/doctrine-value-object-bundle/blob/main/LICENSE.txt).
