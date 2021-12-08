<?php

namespace EnumHelper\Tests;

use EnumHelper\TestData\BackedEnumSuit;
use PHPUnit\Framework\TestCase;

class ValidateNameInBackedEnumSuitTest extends TestCase
{
    /**
     * @dataProvider providerBackedEnumSuit
     */
    public function testBackedEnumValidateName(string $caseName, bool $validity)
    {
        $caseValidity = BackedEnumSuit::isValidCase($caseName);

        self::assertSame($validity, $caseValidity);
    }

    public function providerBackedEnumSuit(): array
    {
        return [
            [BackedEnumSuit::Clubs->name, true],
            [BackedEnumSuit::Diamonds->name, true],
            [BackedEnumSuit::Hearts->name, true],
            [BackedEnumSuit::Spades->name, true],
            [strtoupper(BackedEnumSuit::Hearts->name), false],
            ['NoTrumps', false],
            ['', false],
        ];
    }
}
