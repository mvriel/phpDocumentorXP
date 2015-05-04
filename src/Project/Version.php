<?php

namespace phpDocumentor\Project;

final class Version
{
    /** @var VersionId */
    private $versionIdentifier;

    /** @var Version\Definition */
    private $definition;

    public function __construct(VersionId $versionIdentifier, Version\Definition $definition)
    {
        $this->versionIdentifier = $versionIdentifier;
        $this->definition        = $definition;
    }

    public function getDefinition()
    {
        return $this->definition;
    }

    public function __toString()
    {
        return (string)$this->versionIdentifier;
    }
}
