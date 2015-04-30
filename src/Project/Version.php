<?php

namespace phpDocumentor\Project;

use phpDocumentor\Files\Dsn;

class Version
{
    /** @var VersionId */
    private $versionIdentifier;

    /** @var Dsn */
    private $source;

    public function __construct(VersionId $versionIdentifier, Dsn $source)
    {
        $this->versionIdentifier = $versionIdentifier;
        $this->source = $source;
    }

    public function getDsn()
    {
        return $this->source;
    }

    public function __toString()
    {
        return (string)$this->versionIdentifier;
    }
}
