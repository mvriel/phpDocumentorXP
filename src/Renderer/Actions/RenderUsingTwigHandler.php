<?php

namespace phpDocumentor\Renderer\Actions;

use phpDocumentor\Views\ViewFactory;

final class RenderUsingTwigHandler
{
    /** @var \Twig_Environment */
    private $environment;

    /** @var ViewFactory */
    private $viewFactory;

    public function __construct(\Twig_Environment $environment, ViewFactory $viewFactory)
    {
        $this->environment = $environment;
        $this->viewFactory = $viewFactory;
    }

    /**
     * Handles the given message.
     *
     * @param RenderUsingTwig $message
     *
     * @return void
     */
    public function __invoke(RenderUsingTwig $message)
    {
        var_dump($message);
    }
}
