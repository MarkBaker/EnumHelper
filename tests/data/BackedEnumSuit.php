<?php

namespace EnumHelper\TestData;

use EnumHelper\EnumRestorableFromName;

enum BackedEnumSuit: string
{
    use EnumRestorableFromName;

    case Clubs = 'C';
    case Diamonds = 'D';
    case Hearts = 'H';
    case Spades = 'S';
}
