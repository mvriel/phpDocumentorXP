<?php

namespace phpDocumentor\Api\Php\Traits;

trait CanBeStatic
{
    private $isStatic = false;

    public function isStatic()
    {
        return $this->isStatic;
    }

    private function setIsStatic($isStatic)
    {
        if (!is_bool($isStatic)) {
            throw new \InvalidArgumentException('The static property of an element must be a boolean');
        }

        $this->isStatic = $isStatic;
    }
}
