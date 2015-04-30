<?php

namespace phpDocumentor\Template;

class RenderCommand
{
    private $template;
    private $commandBus;

    public function __construct($template, $commandBus)
    {
        $this->template = $template;
        $this->commandBus = $commandBus;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return mixed
     */
    public function getCommandBus()
    {
        return $this->commandBus;
    }
}
