<?php

namespace phpDocumentor;

use League\Tactician\CommandBus;

class Generator
{
    /**
     * @var CommandBus
     */
    private $commandBus;
    /**
     * @var DocumentationRepository
     */
    private $documentationRepository;

    public function __construct(CommandBus $commandBus, DocumentationRepository $documentationRepository)
    {
        $this->commandBus = $commandBus;
        $this->documentationRepository = $documentationRepository;
    }

    public function generate()
    {
        $documentation = Documentation::create('phpDocumentor', '1.0.0', __DIR__ . '/..');
        $this->documentationRepository->persist($documentation);

        $this->commandBus->handle(new Api\Php\GenerateCommand($documentation, realpath(__DIR__ . '/../src')));
        //$this->commandBus->handle(new \phpDocumentor\Guides\ReST\GenerateCommand($documentation, realpath(__DIR__ . '/../../phpDocumentor/phpDocumentor2/docs/guides')));
        $this->commandBus->handle(new Template\RenderCommand('/my/template', $this->commandBus));
    }
}
