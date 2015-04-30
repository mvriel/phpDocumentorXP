<?php

namespace phpDocumentor\Api\Php\Traits;

use phpDocumentor\Api\Php\Visibility;

trait HasVisibility
{
    /** @var Visibility */
    private $visibility;

    /**
     * @return Visibility
     */
    public function getVisibility()
    {
        return $this->visibility;
    }
}
