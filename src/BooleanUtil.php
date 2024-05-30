<?php

namespace Agcodex\EnumHelper;

trait BooleanUtil
{

    public function is(string|self $name): bool
    {
        if (is_string($name)) {
            return $this instanceof \BackedEnum
                ? $this->value === $name
                : $this->name === $name;
        }

        return $this == $name;
    }

    public function isNot(string|self $name): bool
    {
        return !$this->is($name);
    }
}
