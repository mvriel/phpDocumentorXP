<?php

namespace phpDocumentor\Api\Php\Traits;

use phpDocumentor\Api\Php\Elements\Property;

trait HasProperties
{
    private $properties = [];

    public function addProperty(Property $property)
    {
        $this->properties[] = $property;
    }

    public function getProperties()
    {
        return $this->properties;
    }
}
