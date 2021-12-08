<?php

namespace EnumHelper;

trait EnumRestorableFromName
{
    public static function fromName(string $name): self
    {
        $reflector = new \ReflectionEnum(self::class);
        try {
            $enumReflector = $reflector->getCase($name);
            return $enumReflector->getValue();
        } catch (\ReflectionException $e) {
            throw new \Exception(sprintf('Undefined enum name %s::%s', self::class, $name));
        }
    }
}
