<?php

namespace phpDocumentor;

interface DocumentationItemBuilder
{
    public function create();
    public function load($documentationItem);
    public function addPath($path);
    public function build();
}
