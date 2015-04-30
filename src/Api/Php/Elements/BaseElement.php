<?php

namespace phpDocumentor\Api\Php\Elements;

use phpDocumentor\Api\Element;
use phpDocumentor\Api\Fqsen;

abstract class BaseElement implements Element
{
    /**
     * @var Fqsen
     */
    protected $fqsen;

    /**
     * @var string
     */
    protected $name = '';

    public function __construct(Fqsen $fqsen)
    {
        $this->fqsen = $fqsen;
    }

    /**
     * @return Fqsen
     */
    public function getFqsen()
    {
        return $this->fqsen;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
