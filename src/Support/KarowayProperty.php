<?php

namespace Netsells\Karoway\Support;


abstract class KarowayProperty
{
    public $value;

    public $valueKey;

    protected $property;

    protected $classes = '';
    protected $wrapper = 'span';

    public function __construct($property)
    {
        $this->property = $property;
        $this->valueKey = config('karoway.database.value_field');
        $this->value = $property->{$this->valueKey} ?? '';
    }

    protected function getValue() : string
    {
        return $this->value ?? '';
    }

    public function classes($classes)
    {
        $this->classes += $classes;

        return $this;
    }

    public function getClassAttribute()
    {
        if ($this->classes){
            return "class=\"{$this->classes}\"";
        }

        return '';
    }

    public function getWrapper()
    {
        return "<{$this->wrapper} {$this->getClassAttribute()}>";
    }

    public function getClosingWrapper()
    {
        return "</{$this->wrapper}>";
    }

    public function __toString()
    {
        return "{$this->getWrapper()}{$this->getValue()}{$this->getClosingWrapper()}";
    }
}