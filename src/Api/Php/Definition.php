<?php

namespace phpDocumentor\Api\Php;

final class Definition
{
    /** @var string */
    public $dsn;

    /** @var string[] */
    public $directories;

    /** @var string[] */
    public $ignorePaths;

    /** @var string[] */
    public $extensions;

    public function __construct(
        $directories = ['.'],
        $dsn         = 'file://',
        $ignorePaths = [],
        $extensions  = ['php', 'phtml', 'php3']
    ) {
        $this->directories = $directories;
        $this->dsn = $dsn;
        $this->ignorePaths = $ignorePaths;
        $this->extensions = $extensions;
    }

    public static function createFromXml(\SimpleXmlElement $api)
    {
        $documentationItemDefinition = new static();

        // set path property with array of strings based on the path element
        foreach ($api->path as $key => $path) {
            // only clear default if there is something to iterate
            if ($key == 0) {
                $documentationItemDefinition->directories = [];
            }
            $documentationItemDefinition->directories[] = (string)$path;
        }

        // set ignorePaths property with array of strings based on the ignore element
        foreach ($api->ignore as $ignore) {
            $documentationItemDefinition->ignorePaths[] = (string)$ignore;
        }

        // set extensions property with array of strings based on the extension element
        foreach ($api->extension as $key => $extension) {
            // only clear default if one or more extensions are present
            if ($key == 0) {
                $documentationItemDefinition->extensions = [];
            }
            $documentationItemDefinition->extensions[] = (string)$extension;
        }
        if ((string)$api->dsn) {
            $documentationItemDefinition->dsn = (string)$api->dsn;
        }

        return $documentationItemDefinition;
    }
}
