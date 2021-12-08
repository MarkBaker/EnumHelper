# A trait that allows you to create an enum from a name string in PHP 8.1

[![Build Status](https://github.com/MarkBaker/EnumHelper/workflows/main/badge.svg)](https://github.com/MarkBaker/EnumHelper/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/markbaker/enumhelper)](https://packagist.org/packages/markbaker/enumhelper)
[![Latest Stable Version](https://img.shields.io/github/v/release/MarkBaker/EnumHelper)](https://packagist.org/packages/markbaker/enumhelper)
[![License](https://img.shields.io/github/license/MarkBaker/EnumHelper)](https://packagist.org/packages/markbaker/enumhelper)

This package provides a trait that allows you to create a PHP 8.1 enum from a name string.

## Installation

You can install the package via composer:

```bash
composer require markbaker/enumhelper
```

## Usage

In PHP 8.1, it is possible to create a backed enum from a value using the enum's `from()` or `tryFrom()` methods.

```php
enum Suit: string
{
    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';
}

$suit = Suit::Diamonds;

$value = $suit->value;      // Returns 'D' 

$newSuit = Suit::from($value);
```

The `EnumHelper\EnumRestorableFromName` trait provided in this library adds a `fromName()` method to any enum where you want to create an enum from its name.

```php
enum Suit: string
{
    use EnumHelper\EnumRestorableFromName;

    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';
}

$suit = Suit::Diamonds;

$name = $suit->name;      // Returns 'Diamonds' 

$newSuit = Suit::fromName($name);
```

This could be useful if you wanted to store the name in a database for readability (particularly appropriate for unbacked enums); then recreate the enum in the model when you load the database record.

This works with both backed and unbacked enums.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.