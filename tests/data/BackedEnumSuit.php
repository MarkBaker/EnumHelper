<?php

namespace EnumHelper\TestData;

use EnumHelper\EnumRestorableFromName;
use EnumHelper\EnumValidatableCase;

enum BackedEnumSuit: string
{
    use EnumRestorableFromName, EnumValidatableCase;

    case Clubs = 'C';
    case Diamonds = 'D';
    case Hearts = 'H';
    case Spades = 'S';
}
