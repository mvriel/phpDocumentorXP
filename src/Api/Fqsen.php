<?php

namespace phpDocumentor\Api;

final class Fqsen
{
    private $fqsen;

    public function __construct($fqsen)
    {
        $this->fqsen = $fqsen;
    }

    public function __toString()
    {
        return $this->fqsen;
    }
}
