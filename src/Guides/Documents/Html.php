<?php

namespace phpDocumentor\Guides\Documents;

use phpDocumentor\Guides\Document;

class Html extends Document
{
    public function getContentType()
    {
        return 'text/html';
    }

    public function getPath()
    {
        return parent::getPath() . '.html';
    }
}
