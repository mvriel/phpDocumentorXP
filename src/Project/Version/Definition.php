<?php

namespace phpDocumentor\Project\Version;

use phpDocumentor\Api\Php\Definition as PhpDefinition;

final class Definition
{
    public $versionNumber;

    public $documentationItems = [];

    public function __construct($versionNumber, $documentationItems = [])
    {
        $this->versionNumber = $versionNumber;
        $this->documentationItems = $documentationItems;
    }

    public static function createFromXml(\SimpleXMLElement $version)
    {
        // version attribute to first constructor argument
        $versionDefinition = new static((string)$version->attributes()['number']);
        foreach($version->api as $api) {
            if ($api->attributes()['language'] == 'php') {
                $versionDefinition->documentationItems[] = PhpDefinition::createFromXml($api);
            }
        }

        return $versionDefinition;
    }
}
