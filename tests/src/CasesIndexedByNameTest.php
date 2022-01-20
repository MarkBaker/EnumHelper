<?php

namespace EnumHelper\Tests;

use EnumHelper\TestData\EnumSuit;
use PHPUnit\Framework\TestCase;

class CasesIndexedByNameTest extends TestCase
{
    public function testCasesIndexedByName()
    {
        $cases = EnumSuit::casesIndexedByName();

        foreach ($cases as $caseName => $case) {
            self::assertSame($case->name, $caseName);
        }
    }
}
