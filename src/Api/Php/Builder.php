<?php

namespace phpDocumentor\Api\Php;

use phpDocumentor\Api\Language;
use phpDocumentor\Api;
use phpDocumentor\Files\File;
use PhpParser\Node;
use PhpParser\NodeVisitor;

final class DocumentationItemBuilder implements \phpDocumentor\DocumentationItemBuilder
{
    /**
     * @var \PhpParser\Parser
     */
    private $phpParser;

    /**
     * @var \PhpParser\NodeTraverser
     */
    private $traverser;

    /**
     * @var Api
     */
    private $documentationItem;

    /**
     * @var ElementFactory
     */
    private $factory;

    public function __construct(
        \PhpParser\Parser $phpParser,
        \PhpParser\NodeTraverser $traverser,
        ElementFactory $factory
    ) {
        $this->phpParser = $phpParser;
        $this->traverser = $traverser;
        $this->factory   = $factory;
    }

    public function create()
    {
        $this->documentationItem = new Api(new Language('php'));
    }

    public function load($documentationItem)
    {
        $this->documentationItem = $documentationItem;
    }

    public function build()
    {
        return $this->documentationItem;
    }

    /**
     * @param File $path
     */
    public function addPath($path)
    {
        ini_set('xdebug.max_nesting_level', 10000);

        $parsedContents = $this->phpParser->parse($this->getFileContents($path));
        $this->traverser->traverse($parsedContents);

        foreach($parsedContents as $node) {
            $element = $this->factory->create($node);
            if ($element === null) {
                continue;
            }

            $this->documentationItem->addElement($element);
        }
    }

    /**
     * @param string|File $path
     * @return string
     */
    private function getFileContents($path)
    {
        if ($path instanceof File) {
            $contents = $path->getContents();
        } elseif (is_string($path) && is_readable($path) && is_file($path)) {
            $contents = file_get_contents($path);
        } elseif (is_string($path)) {
            throw new \InvalidArgumentException(sprintf('The provided path "%s" could not be read', $path));
        } else {
            throw new \InvalidArgumentException(
                sprintf(
                    'The provided path should either be a string pointing to a file that should be parsed or an object '
                    . 'of class phpDocumentor\Files\File but found an object of class "%s"',
                    get_class($path)
                )
            );
        }

        return $contents;
    }
}
