<?php

namespace phpDocumentor\Api\Php;

use phpDocumentor\DocumentationRepository;
use phpDocumentor\Files\Finder;
use phpDocumentor\Files\Specification\HasExtension;
use phpDocumentor\Files\Specification\InPath;
use phpDocumentor\Project\Version;

class GenerateCommandHandler
{
    /** @var DocumentationItemBuilder */
    private $builder;

    /** @var Finder */
    private $finder;

    /** @var DocumentationRepository */
    private $documentationRepository;

    public function __construct(
        DocumentationRepository $documentationRepository,
        DocumentationItemBuilder $builder,
        Finder $finder
    ) {
        $this->documentationRepository = $documentationRepository;
        $this->builder                 = $builder;
        $this->finder                  = $finder;
    }

    public function __invoke(GenerateCommand $command)
    {
        $documentation = $this->documentationRepository->findByVersion($command->version);
        if (! $documentation) {
            throw new \InvalidArgumentException(
                'Unable to generate API documentation, the documentation for the provided version number "'
                . $command->version . '" could not be found'
            );
        }
        $this->builder->create();

        $specification = new InPath((string)$command->path);
        $specification = $specification->andX(new HasExtension(['php']));

        foreach ($this->finder->find($documentation->getVersion()->getDsn(), $specification) as $path) {
            $this->builder->addPath($path);
        }

        $documentation->addApiSpecification($this->builder->build());
    }
}
