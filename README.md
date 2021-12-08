# A library of helper traits for working with PHP 8.1 enums 

[![Build Status](https://github.com/MarkBaker/EnumHelper/workflows/main/badge.svg)](https://github.com/MarkBaker/EnumHelper/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/markbaker/enumhelper)](https://packagist.org/packages/markbaker/enumhelper)
[![Latest Stable Version](https://img.shields.io/github/v/release/MarkBaker/EnumHelper)](https://packagist.org/packages/markbaker/enumhelper)
[![License](https://img.shields.io/github/license/MarkBaker/EnumHelper)](https://packagist.org/packages/markbaker/enumhelper)

This package provides a series of traits that allows you to:
 - RestorableFromName Trait

   Create/restore a PHP 8.1 enum from a name string.
 - EnumValidatableCase

   Validate an enum name from a name string.

## Installation

You can install the package via composer:

```bash
composer require markbaker/enumhelper
```

## Usage

### RestorableFromName Trait

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

$suitName = $suit->name;      // Returns 'Diamonds' 

$newSuit = Suit::fromName($suitName);
```

An invalid name will throw an exception. Note that names are case-sensitive.

This could be useful if you wanted to store the name in a database for readability (particularly appropriate for unbacked enums); then recreate the enum in the model when you load the database record.

This works with both backed and unbacked enums.

### EnumValidatableCase Trait

Useful to validate if a name has been defined in the case set for an enum:

```php
enum Suit: string
{
    use EnumHelper\EnumValidatableCase;

    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';
}

$suit = Suit::Diamonds;

$validCaseName = Suit::Hearts;
$isCaseNameValid = Suit::isValidCase($validCaseName);      // Returns boolean true

$invalidCaseName = 'HeArTs';
$isCaseNameValid = Suit::isValidCase($invalidCaseName);    // Returns boolean false
```

Note that names are case-sensitive.

This works with both backed and unbacked enums.

## Changelog

Please see the [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

This librar is released under the MIT License (MIT). Please see [License File](LICENSE.md) for more information.