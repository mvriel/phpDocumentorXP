<?php

namespace phpDocumentor\Template;

use League\Tactician\CommandBus;

final class Renderer
{
    public function render(CommandBus $messageBus, Template $template)
    {
        foreach ($template->getActions() as $action) {
            $messageBus->handle($action);
        }
    }
}
