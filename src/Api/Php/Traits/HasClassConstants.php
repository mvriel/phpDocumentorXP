<?php

namespace phpDocumentor\Api\Php\Traits;

use phpDocumentor\Api\Php\Elements\ClassConstant;

trait HasClassConstants
{
    private $constants = [];

    public function addConstant(ClassConstant $constant)
    {
        $this->constants[] = $constant;
    }

    public function getConstants()
    {
        return $this->constants;
    }
}
