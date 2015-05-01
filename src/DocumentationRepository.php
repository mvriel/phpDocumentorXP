<?php

namespace phpDocumentor;

use phpDocumentor\Project\Version;

final class DocumentationRepository
{
    private $documentations = [];

    public function findAll()
    {
        return $this->documentations;
    }

    public function findByVersion(Version $version)
    {
        return isset($this->documentations[(string)$version])
            ? $this->documentations[(string)$version]
            : null;
    }

    /**
     * @param string $versionNumber
     *
     * @return Documentation|null
     */
    public function findByVersionNumber($versionNumber)
    {
        return isset($this->documentations[(string)$versionNumber])
            ? $this->documentations[(string)$versionNumber]
            : null;
    }

    public function persist(Documentation $documentation)
    {
        $this->documentations[(string)$documentation->getVersion()] = $documentation;
    }
}
