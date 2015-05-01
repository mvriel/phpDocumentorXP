<?php

namespace phpDocumentor;

use \Mockery as m;
use phpDocumentor\Guides\Document;

final class GuideTest extends \PHPUnit_Framework_TestCase
{
    public function testAddingADocument()
    {
        $fixture  = new Guide();
        $document = $this->givenADocument();

        $fixture->addDocument($document);

        $this->assertSame([$document], $fixture->getDocuments());
    }

    /**
     * @return m\MockInterface|Document
     */
    private function givenADocument()
    {
        return m::mock('phpDocumentor\Guides\Document');
    }
}
