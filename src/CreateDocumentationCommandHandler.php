<?php


namespace phpDocumentor;


class CreateDocumentationCommandHandler
{
    /**
     * @var \phpDocumentor\DocumentationRepository
     */
    private $documentationRepository;

    public function __construct(\phpDocumentor\DocumentationRepository $documentationRepository)
    {
        $this->documentationRepository = $documentationRepository;
    }

    public function __invoke(CreateDocumentationCommand $command)
    {
        $documentation = \phpDocumentor\Documentation::create('phpDocumentor', $command->version);
        $this->documentationRepository->persist($documentation);
    }
}
