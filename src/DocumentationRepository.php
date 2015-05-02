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

    /**
     * @param Version $version
     * @return Documentation|null
     */
    public function findByVersion(Version $version)
    {
        return isset($this->documentations[(string)$version])
            ? $this->documentations[(string)$version]
            : null;
    }

    public function persist(Documentation $documentation)
    {
        $this->documentations[(string)$documentation->getVersion()] = $documentation;
    }
}
