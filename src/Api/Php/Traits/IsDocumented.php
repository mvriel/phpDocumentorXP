<?php

namespace phpDocumentor\Api\Php\Traits;

use phpDocumentor\Api\Php\DocBlock;

trait IsDocumented
{
    private $docBlock;

    public function getDocBlock()
    {
        return $this->docBlock;
    }

    public function setDocBlock(DocBlock $docBlock)
    {
        $this->docBlock = $docBlock;
    }
}
