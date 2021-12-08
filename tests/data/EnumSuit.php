<?php

namespace EnumHelper\TestData;

use EnumHelper\EnumRestorableFromName;
use EnumHelper\EnumValidatableCase;

enum EnumSuit
{
    use EnumRestorableFromName, EnumValidatableCase;

    case Clubs;
    case Diamonds;
    case Hearts;
    case Spades;
}
