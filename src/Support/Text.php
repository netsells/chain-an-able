<?php

namespace Netsells\Karoway\Support;

class Text extends Karoway
{
    public $value;
    public $valueKey;
    protected $property;

    public function __construct($property)
    {
        $this->property = $property;
        $this->valueKey = config('karoway.database.value_field');
        $this->value = $property->{$this->valueKey} ?? '';
    }

    protected function getValue() : string
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->getValue() ?? '';
    }
}