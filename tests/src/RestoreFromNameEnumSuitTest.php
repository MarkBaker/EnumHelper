<?php

namespace EnumHelper\Tests;

use EnumHelper\TestData\EnumSuit;
use EnumHelper\TestData\NotAnEnum;
use PHPUnit\Framework\TestCase;

class RestoreFromNameEnumSuitTest extends TestCase
{
    /**
     * @dataProvider providerEnumSuit
     */
    public function testEnumRestorableFromName(EnumSuit $enum)
    {
        $enumName = $enum->name;
        $restoredEnum = EnumSuit::fromName($enumName);

        self::assertSame($enum, $restoredEnum);
    }

    public function testBackedEnumThrowsExceptionFromInvalidName()
    {
        self::expectException(\Exception::class);
        self::expectExceptionMessage('Undefined enum name');

        EnumSuit::fromName('noTrumps');
    }

    public function testFromNameThrowsExceptionIfNotEnum()
    {
        self::expectException(\Exception::class);
        self::expectExceptionMessage('Undefined enum name');

        NotAnEnum::fromName('Mark');
    }

    public function providerEnumSuit(): array
    {
        return [
            [EnumSuit::Clubs],
            [EnumSuit::Diamonds],
            [EnumSuit::Hearts],
            [EnumSuit::Spades],
        ];
    }
}
