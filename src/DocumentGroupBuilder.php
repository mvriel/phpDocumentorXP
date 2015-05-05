<?php

namespace phpDocumentor;

interface DocumentGroupBuilder
{
    public function create();
    public function load(DocumentGroup $documentGroup);
    public function addPath($path);
    public function build();
}
