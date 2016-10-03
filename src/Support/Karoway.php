<?php

namespace Netsells\Karoway\Support;

class Karoway
{
    protected $attributeRelationship;

    protected $repeatableAttribute = false;

    protected $page;

    public function __construct()
    {
        $this->key = config('karoway.database.key_field');
        $this->attributeRelationship = config('karoway.models.page.relation');
    }

    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    public function text($key)
    {
        if ($this->repeatableAttribute) {
            return (new Text($key));
        }

        return (new Text($this->getProperty($key)));
    }

    public function image($key)
    {
        return (new Image($this->getProperty($key)));
    }

    public function repeatable($key)
    {
        return $this->getRepeatable($key);
    }

    public function setRepeatableAttribute()
    {
        $this->repeatableAttribute = true;

        return $this;
    }

    private function getProperty($key)
    {
        if ( ! $this->page) {
            return false;
        }

        if ($property = $this->keyExists($key)) {
            return $property;
        }

        return $this->displayKeyToUser($key);
    }

    private function displayKeyToUser($key)
    {
        // This doesn't belong. #cheating
        \JavaScript::put([
            'undeclared_variable_usages' => [
                $key
            ]
        ]);

        return false;
    }

    private function keyExists($key)
    {
        return $this->page->{$this->attributeRelationship}->first(function ($property) use ($key) {
            return $property->{$this->key} == $key;
        });
    }

    private function getRepeatable($key)
    {
        $repeatables = $this->page->{$this->attributeRelationship}->filter(function ($property) use ($key) {
            return str_contains($property->{$this->key}, $key);
        })->groupBy('repeatable_uuid');

        return $repeatables->map(function($repeatable) {
            return new Repeatable($repeatable);
        });
    }
}