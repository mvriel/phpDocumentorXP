<?php

namespace phpDocumentor\Renderer\Actions;

final class RenderUsingTwig
{
    /** @var mixed[] */
    private $options;

    public function __construct($options = [])
    {
        $this->options = $options;
    }
}
