<?php

namespace Netsells\Karoway\Support;

class Image extends KarowayProperty
{
    protected $wrapper = '';

    protected function getElement()
    {
        return "<img src='{$this->getValue()}'>";
    }

    public function __toString()
    {
        return "{$this->getWrapper()}{$this->getElement()}{$this->getClosingWrapper()}";
    }

    public function plain()
    {
        return $this->value;
    }
}