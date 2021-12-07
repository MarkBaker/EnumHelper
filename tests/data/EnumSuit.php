<?php

namespace EnumHelper\TestData;

use EnumHelper\EnumRestorableFromName;

enum EnumSuit
{
    use EnumRestorableFromName;

    case Clubs;
    case Diamonds;
    case Hearts;
    case Spades;
}
