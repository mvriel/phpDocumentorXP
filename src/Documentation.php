<?php

namespace phpDocumentor;

use phpDocumentor\Files\Dsn;
use phpDocumentor\Project\Version;

final class Documentation
{
    private $title;

    private $version;

    private $guides = array();

    private $apiSpecifications = array();

    public function __construct($title, Version $version)
    {
        $this->title   = $title;
        $this->version = $version;
    }

    public static function create($title, Version $version)
    {
        return new Documentation($title, $version);
    }

    public function addGuide(Guide $guide)
    {
        $this->guides[] = $guide;
    }

    public function getGuides()
    {
        return $this->guides;
    }

    public function addApiSpecification(Api $specification)
    {
        $this->apiSpecifications[] = $specification;
    }

    public function getApiSpecifications()
    {
        return $this->apiSpecifications;
    }

    public function getVersion()
    {
        return $this->version;
    }
}
