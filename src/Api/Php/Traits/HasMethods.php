<?php

namespace phpDocumentor\Api\Php\Traits;

use phpDocumentor\Api\Php\Elements\Method;

trait HasMethods
{
    private $methods = [];

    public function addMethod(Method $method)
    {
        $this->methods[] = $method;
    }

    public function getMethods()
    {
        return $this->methods;
    }
}
