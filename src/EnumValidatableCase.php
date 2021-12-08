<?php

namespace EnumHelper;

trait EnumValidatableCase
{
    public static function isValidCase(string $name): bool
    {
        $reflector = new \ReflectionEnum(self::class);
        try {
            $reflector->getCase($name);
        } catch (\ReflectionException $e) {
            return false;
        }

        return true;
    }
}
