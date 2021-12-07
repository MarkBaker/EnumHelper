<?php

namespace EnumHelper;

trait EnumRestorableFromName
{
    public static function fromName(string $name)
    {
        try {
            $reflector = new \ReflectionEnum(self::class);
            $enumReflector = $reflector->getCase($name);
            return $enumReflector->getValue();
        } catch (\ReflectionException $e) {
            throw new \Exception(sprintf('Undefined enum name %s::%s', self::class, $name));
        }
    }
}
