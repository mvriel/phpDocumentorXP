<?php

namespace phpDocumentor\Template;

final class Renderer
{
    public function render($messageBus, Template $template)
    {
        foreach ($template->getActions() as $action) {
            $messageBus->handle($action);
        }
    }
}
