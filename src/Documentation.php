<?php

namespace phpDocumentor;

use phpDocumentor\Files\Dsn;
use phpDocumentor\Project\Version;

final class Documentation
{
    private $title;

    private $version;

    private $documentGroups = array();

    public function __construct($title, Version $version)
    {
        $this->title   = $title;
        $this->version = $version;
    }

    public static function create($title, Version $version)
    {
        return new Documentation($title, $version);
    }

    public function addDocumentGroup(DocumentGroup $specification)
    {
        $this->documentGroups[] = $specification;
    }

    public function getDocumentGroups()
    {
        return $this->documentGroups;
    }

    public function getVersion()
    {
        return $this->version;
    }
}
