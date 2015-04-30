<?php

namespace phpDocumentor\Api\Php;

final class DocBlock
{
    private $summary     = '';
    private $description = '';
    private $tags        = [];

    public function getSummary()
    {
        return $this->summary;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getTags()
    {
        return $this->tags;
    }
}
