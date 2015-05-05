<?php

namespace phpDocumentor;

use phpDocumentor\Api\Language;

final class Api implements DocumentGroup
{
    /**
     * @var Language
     */
    private $language;

    /**
     * @var Api\Element[]
     */
    private $elements = [];

    public function __construct(Language $language)
    {
        $this->language = $language;
    }

    public function addElement(Api\Element $element)
    {
        $this->elements[] = $element;
    }

    public function getElements()
    {
        return $this->elements;
    }
}
