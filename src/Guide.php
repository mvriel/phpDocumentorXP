<?php

namespace phpDocumentor;

use phpDocumentor\Guides\Document;

final class Guide implements DocumentGroup
{
    /** @var Document */
    private $documents;

    public function addDocument(Document $document)
    {
        $this->documents[] = $document;
    }

    public function getDocuments()
    {
        return $this->documents;
    }
}
