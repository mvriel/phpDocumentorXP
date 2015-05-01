<?php

namespace phpDocumentor\Api\Php;

use phpDocumentor\Documentation;

final class GenerateCommand
{
    public $path;
    public $versionNumber;

    public function __construct($versionNumber, $path)
    {
        $this->path = $path;
        $this->versionNumber = $versionNumber;
    }
}
