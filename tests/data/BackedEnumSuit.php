<?php

namespace EnumHelper\TestData;

use EnumHelper\EnumRestorableFromName;
use EnumHelper\EnumValidatableCase;
use EnumHelper\CasesIndexedByName;

enum BackedEnumSuit: string
{
    use EnumRestorableFromName, EnumValidatableCase, CasesIndexedByName;

    public const RED = 'Red';
    public const BLACK = 'Black';

    case Clubs = 'C';
    case Diamonds = 'D';
    case Hearts = 'H';
    case Spades = 'S';

    public function color(): string {
        return match($this) {
            self::Hearts, self::Diamonds => self::RED,
            self::Clubs, self::Spades => self::BLACK,
        };
    }

    public static function red(): array {
        return array_filter(
            self::casesIndexedByName(),
            fn(self $suit) => $suit->color() === self::RED
        );
    }

    public static function black(): array {
        return array_filter(
            self::casesIndexedByName(),
            fn(self $suit) => $suit->color() === self::BLACK
        );
    }
}
