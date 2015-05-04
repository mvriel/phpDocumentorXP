<?php

namespace phpDocumentor\Api\Php;

use phpDocumentor\Project\Version;

final class GenerateCommand
{
    /** @var Version */
    public $version;

    /** @var Definition */
    public $definition;

    public function __construct(Version $version, Definition $definition)
    {
        $this->version    = $version;
        $this->definition = $definition;
    }
}
