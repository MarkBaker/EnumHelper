<?php

namespace EnumHelper\Tests;

use EnumHelper\TestData\BackedEnumSuit;
use PHPUnit\Framework\TestCase;

class BackedEnumSuitTest extends TestCase
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
        self::expectException(\Exception::class);
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
