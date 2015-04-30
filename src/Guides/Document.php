<?php

namespace phpDocumentor\Guides;

abstract class Document
{
    /** @var Path */
    private $path;

    /** @var string  */
    private $title = '';

    /** @var string  */
    private $content = '';

    public function __construct(Path $path, $content)
    {
        $this->content = $content;
        $this->path    = $path;
    }

    abstract public function getContentType();

    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
