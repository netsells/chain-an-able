<?php

namespace Netsells\Karoway\Support;


use App\Karoway\Properties\Property;

abstract class KarowayProperty
{
    /**
     * The value from the database.
     *
     * @var string
     */
    public $value;

    /**
     * The key from the database.
     *
     * @var string
     */
    public $valueKey;

    /**
     * The property model.
     *
     * @var Property
     */
    protected $property;

    /**
     * The classes to be bind to the element.
     *
     * @var string
     */

    protected $classes = '';

    /**
     * The container element, the element that will encapsulate our value.
     *
     * @var string
     */

    protected $wrapper = 'span';

    /**
     * assign the model and get custom configuration.
     * @param $property
     */
    public function __construct($property)
    {
        $this->property = $property;
        $this->valueKey = config('karoway.database.value_field');
        $this->value = $property->{$this->valueKey} ?? '';
    }

    /**
     * This sets the wrapper.
     *
     * @param $tag
     * @return $this
     */
    public function wrap($tag)
    {
        $this->wrapper = $tag;

        return $this;
    }

    /**
     * This allows the user to apply classes to the element that will contain the value.
     *
     * @param $classes
     * @return $this
     */
    public function classes($classes)
    {
        $this->classes .= $classes;

        return $this;
    }

    /**
     * See if we have a value, if we don't default to an empty string.
     *
     * @return string
     */
    protected function getValue() : string
    {
        return $this->value ?? '';
    }

    /**
     * Get the class attribute with the user specified classes.
     *
     * @return string
     */
    protected function getClassAttribute()
    {
        if ($this->classes) {
            return "class=\"{$this->classes}\"";
        }

        return '';
    }

    /**
     * If we want a wrapper this will construct it with the specified classes.
     *
     * @return string
     */
    public function getWrapper()
    {
        if ($this->wrapper) {
            return "<{$this->wrapper} {$this->getClassAttribute()}>";
        }
    }

    /**
     * Closes out the element.
     *
     * @return string
     */
    public function getClosingWrapper()
    {
        return "</{$this->wrapper}>";
    }

    /**
     * Whips the element to get along with the value inside it.
     *
     * @return string
     */
    public function __toString()
    {
        return "{$this->getWrapper()}{$this->getValue()}{$this->getClosingWrapper()}";
    }
}