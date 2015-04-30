<?php

namespace phpDocumentor\Guides\ReST;

use phpDocumentor\Documentation;

final class GenerateCommand
{
    /** @var Documentation */
    private $documentation;
    private $path;

    public function __construct(Documentation $documentation, $path)
    {
        $this->documentation = $documentation;
        $this->path = $path;
    }

    public function getDocumentation()
    {
        return $this->documentation;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}
