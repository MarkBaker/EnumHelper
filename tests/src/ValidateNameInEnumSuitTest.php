<?php

namespace EnumHelper\Tests;

use EnumHelper\TestData\EnumSuit;
use PHPUnit\Framework\TestCase;

class ValidateNameInEnumSuitTest extends TestCase
{
    /**
     * @dataProvider providerEnumSuit
     */
    public function testBackedEnumValidateName(string $caseName, bool $validity)
    {
        $caseValidity = EnumSuit::isValidCase($caseName);

        self::assertSame($validity, $caseValidity);
    }

    public function providerEnumSuit(): array
    {
        return [
            [EnumSuit::Clubs->name, true],
            [EnumSuit::Diamonds->name, true],
            [EnumSuit::Hearts->name, true],
            [EnumSuit::Spades->name, true],
            [strtoupper(EnumSuit::Hearts->name), false],
            ['NoTrumps', false],
            ['', false],
        ];
    }
}
