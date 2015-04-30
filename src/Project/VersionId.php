<?php

namespace phpDocumentor\Project;

final class VersionId
{
    private $versionId;

    public function __construct($versionId)
    {
        $this->versionId = $versionId;
    }

    public function __toString()
    {
        return $this->versionId;
    }
}
