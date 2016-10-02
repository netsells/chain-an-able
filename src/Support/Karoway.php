<?php

namespace Karoway\Support;

class Karoway
{
    protected $attributeRelationship;
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
        return (new Text($this->getProperty($key)));
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
}