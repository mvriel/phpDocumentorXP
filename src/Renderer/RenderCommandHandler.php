<?php

namespace phpDocumentor\Renderer;

class RenderCommandHandler
{
    /**
     * @var Renderer
     */
    private $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(RenderCommand $renderCommand)
    {
        // $this->templateRepository->findByPath($renderCommand->getTemplate());

        $template = new Template(
            [new \phpDocumentor\Renderer\Actions\RenderUsingTwig(['view' => 'MyView', 'template' => 'index.html.twig'])],
            ['location' => '/path/to/clean/template']
        );

        $this->renderer->render($renderCommand->getCommandBus(), $template);
    }
}
