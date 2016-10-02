<?php

namespace Netsells\Karoway\Support;

class Text extends KarowayProperty
{
    public function __toString()
    {
        return $this->formatAttribute($this->getValue());
    }
}