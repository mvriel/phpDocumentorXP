<?php

namespace phpDocumentor\Guides\ReST;

use Gregwar\RST\Builder as ReSTBuilder;
use phpDocumentor\DocumentGroup;
use phpDocumentor\Files;
use phpDocumentor\Guide;
use phpDocumentor\Guides\Documents\Html;
use phpDocumentor\Guides\Path;

class GuideBuilder implements \phpDocumentor\DocumentGroupBuilder
{
    /** @var Guide */
    private $documentGroup;

    /** @var string[] */
    private $directories;

    /** @var GuideBuilder */
    private $builder;

    /** @var boolean */
    private $verbose;

    public function __construct(ReSTBuilder $builder, $verbose = false)
    {
        $this->builder = $builder;
        $this->verbose = $verbose;
        $builder->getErrorManager()->abortOnError(false);
    }

    public function create()
    {
        $this->documentGroup = new Guide();
    }

    public function addPath($path)
    {
        $this->checkPath($path);
        $this->directories[] = $path;
    }

    public function build()
    {
        $target = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'phd_' . md5(time());

        foreach ($this->directories as $folder) {
            if (count($this->directories) > 1) {
                $target .= DIRECTORY_SEPARATOR . basename($folder);
            }

            $this->builder->build($folder, $target, $this->verbose);
        }

        $metaData = include $target . DIRECTORY_SEPARATOR . 'meta.php';
        foreach($metaData as $documentData) {
            $contents = file_get_contents($target . DIRECTORY_SEPARATOR . $documentData['url']);
            preg_match('/<body>(.*)<\\/body>/suxi', $contents, $matches);
            $contents = trim($matches[1]);

            $document = new Html(new Path($documentData['file']), $contents);
            $document->setTitle($documentData['title']);
            $this->documentGroup->addDocument($document);
        }

        return $this->documentGroup;
    }

    public function load(DocumentGroup $documentGroup)
    {
        $this->documentGroup = $documentGroup;
    }

    /**
     * @param $path
     */
    private function checkPath($path)
    {
        if (is_string($path) === false) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Only a string containing a directory path is supported when building ReST documentation, '
                    . 'an argument of type "%s" was provided',
                    gettype($path)
                )
            );
        }

        if (is_dir($path) === false) {
            throw new \InvalidArgumentException(
                sprintf(
                    'You can only provide existing directories as source for building documentation using ReST, '
                    . '"%s" is not a directory',
                    $path
                )
            );
        }
    }
}
