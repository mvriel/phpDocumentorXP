<?php

namespace phpDocumentor\Template;

use SimpleBus\Message\Message;

class Template
{
    /** @var string[] */
    private $options;

    /** @var object[] */
    private $actions;

    final public function __construct(array $actions = [], array $options = [])
    {
        foreach ($options as $key => $value) {
            $this->setOption($key, $value);
        }

        foreach ($actions as $action) {
            $this->addAction($action);
        }

        $this->registerOptions();
        $this->registerActions();
    }

    final public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return Message[]
     */
    final public function getActions()
    {
        return $this->actions;
    }

    protected function registerOptions()
    {
        // Hook method that can be used to create a template as PHP file and not using configuration
    }

    protected function registerActions()
    {
        // Hook method that can be used to create a template as PHP file and not using configuration
    }

    final protected function setOption($key, $value)
    {
        $this->options[$key] = $value;
    }

    final protected function addAction($action)
    {
        $this->actions[] = $action;
    }
}
