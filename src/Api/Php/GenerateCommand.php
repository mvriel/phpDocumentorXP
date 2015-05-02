<?php

namespace phpDocumentor\Api\Php;

use Eloquent\Pathogen\PathInterface;
use phpDocumentor\Project\Version;

final class GenerateCommand
{
    /** @var PathInterface */
    public $path;

    /** @var Version */
    public $version;

    public function __construct(Version $version, PathInterface $path)
    {
        $this->version = $version;
        $this->path    = $path;
    }
}
