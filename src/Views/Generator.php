<?php

namespace phpDocumentor\Views;

interface Generator
{
    public function __invoke(array $documentations);
}
