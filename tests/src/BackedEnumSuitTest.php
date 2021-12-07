<?php

namespace EnumHelper\Tests;

use EnumHelper\Tests\Data\BackedEnumSuit;
use PHPUnit\Framework\TestCase;

class EnumSuitTest extends TestCase
{
    /**
     * @dataProvider providerBackedEnumSuit
     */
    public function testBackedEnumRestorableFromName(BackedEnumSuit $enum)
    {
        $enumName = $enum->name;
        $restoredEnum = BackedEnumSuit::fromName($enumName);

        self::assertSame($enum, $restoredEnum);
    }

    public function testBackedEnumThrowsExceptionFromInvalidName()
    {
        self::xpectException(\Exception::class);
        self::expectExceptionMessage('Undefined enum name');

        BackedEnumSuit::fromName('noTrumps');
    }

    public function providerBackedEnumSuit(): array
    {
        return [
            [BackedEnumSuit::Clubs],
            [BackedEnumSuit::Diamonds],
            [BackedEnumSuit::Hearts],
            [BackedEnumSuit::Spades],
        ];
    }
}
