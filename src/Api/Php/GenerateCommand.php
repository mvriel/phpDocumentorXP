<?php

namespace phpDocumentor\Api\Php;

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
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }
}
