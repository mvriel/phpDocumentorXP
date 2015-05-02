<?php

namespace phpDocumentor;

use phpDocumentor\Project\Version;

class CreateDocumentationCommand
{
    public $version;

    public function __construct(Version $version)
    {
        $this->version = $version;
    }
}
