<?php

namespace phpDocumentor\Api\Php;

use phpDocumentor\DocumentationRepository;
use phpDocumentor\Files\Finder;
use phpDocumentor\Files\Specification\HasExtension;
use phpDocumentor\Files\Specification\InPath;
use phpDocumentor\Project\Version;

class GenerateCommandHandler
{
    /** @var PhpReferenceBuilder */
    private $builder;

    /** @var DocumentationRepository */
    private $documentationRepository;

    public function __construct(DocumentationRepository $documentationRepository, PhpReferenceBuilder $builder)
    {
        $this->documentationRepository = $documentationRepository;
        $this->builder                 = $builder;
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

        $definition = $command->definition;

        $specification = new HasExtension($definition->extensions);
        foreach ($definition->directories as $path) {
            $specification = $specification->andX(new InPath($path));
        }
        foreach ($definition->ignorePaths as $path) {
            $specification = $specification->not(new InPath($path));
        }

        $fileSystem = new \League\Flysystem\Filesystem(new \League\Flysystem\Adapter\Local(__DIR__ . '/..'));
        $fileSystem->addPlugin(new \phpDocumentor\FlyFinder());
        foreach ($fileSystem->find($specification) as $path) {
            $this->builder->addPath($path);
        }

        $documentation->addDocumentGroup($this->builder->build());
    }
}
