<?php

namespace EnumHelper\Tests\Data;

use EnumHelper\EnumRestorableFromName;

enum EnumSuit
{
    use EnumRestorableFromName;

    case Clubs;
    case Diamonds;
    case Hearts;
    case Spades;
}
