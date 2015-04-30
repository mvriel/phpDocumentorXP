<?php

namespace phpDocumentor\Api\Php\Elements;

use phpDocumentor\Api\Php\Traits;

final class Interface_ extends BaseElement
{
    use Traits\IsDocumented;

    private $methods = [];

    public function addMethod(Method $method)
    {
        $this->methods[] = $method;
    }
}
