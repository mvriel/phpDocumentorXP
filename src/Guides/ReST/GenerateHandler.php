<?php

namespace phpDocumentor\Guides\ReST;

class GenerateHandler
{
    /** @var DocumentationItemBuilder */
    private $builder;

    public function __construct(DocumentationItemBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function __invoke(GenerateCommand $command)
    {
        $documentation = $command->getDocumentation();

        $this->builder->create();
        $this->builder->addPath($command->getPath());
        $documentation->addGuide($this->builder->build());
    }
}
