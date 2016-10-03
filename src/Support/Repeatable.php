<?php

namespace Netsells\Karoway\Support;

class Repeatable
{
    public $properties;

    public function __construct($properties)
    {
        $this->properties = $properties;
    }

    public function text($key)
    {
        return (new Text($this->getProperty($key)));
    }

    public function image($key)
    {
        return (new Image($this->getProperty($key)));
    }

    private function getProperty($key)
    {
        return $this->properties->first(function($property) use($key) {
            return str_contains($property->key, $key);
        });
    }
}