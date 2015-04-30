<?php

namespace phpDocumentor\Guides;

class Path
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function __toString()
    {
        return $this->path;
    }
}
