<?php

namespace phpDocumentor\Api\Php;

use phpDocumentor\Files\Finder;
use phpDocumentor\Files\Specification\HasExtension;
use phpDocumentor\Files\Specification\InPath;

class GenerateHandler
{
    /** @var DocumentationItemBuilder */
    private $builder;

    /** @var Finder */
    private $finder;

    public function __construct(DocumentationItemBuilder $builder, Finder $finder)
    {
        $this->builder = $builder;
        $this->finder = $finder;
    }

    public function __invoke(GenerateCommand $command)
    {
        $documentation = $command->getDocumentation();
        $this->builder->create();

        $specification = new InPath($command->getPath());
        $specification = $specification->andX(new HasExtension(['php']));

        foreach ($this->finder->find($documentation->getVersion()->getDsn(), $specification) as $path) {
            $this->builder->addPath($path);
        }

        $documentation->addApiSpecification($this->builder->build());
    }
}
