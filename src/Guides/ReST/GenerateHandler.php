<?php

namespace phpDocumentor\Guides\ReST;

class GenerateHandler
{
    /** @var GuideBuilder */
    private $builder;

    public function __construct(GuideBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function __invoke(GenerateCommand $command)
    {
        $documentation = $command->getDocumentation();

        $this->builder->create();
        $this->builder->addPath($command->getPath());
        $documentation->addDocumentGroup($this->builder->build());
    }
}
