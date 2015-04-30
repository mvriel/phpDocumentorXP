<?php

namespace phpDocumentor\Views;

use phpDocumentor\Documentation;
use phpDocumentor\DocumentationRepository;

final class ViewFactory
{
    private $mappings;

    /** @var DocumentationRepository */
    private $documentationRepository;

    public function __construct($mappings = [], DocumentationRepository $documentationRepository)
    {
        foreach ($mappings as $name => $className) {
            $this->registerMapping($name, $className);
        }
        $this->documentationRepository = $documentationRepository;
    }

    public function registerMapping($name, $className)
    {
        $this->mappings[$name] = $className;
    }

    /**
     * Generates a view of all sets of documentation that can be used to render artifacts with.
     *
     * @param string $viewName
     *
     * @return \Iterator
     */
    public function create($viewName)
    {
        $documentations = $this->documentationRepository->findAll();
        $generator = $this->createGenerator($viewName);

        $view = $generator($documentations);
        if (is_array($view)) {
            $view = new \ArrayIterator($view);
        }

        if (! $view instanceof \Iterator) {
            throw new \RuntimeException('Views are expected to return an Iterator or an array');
        }

        return $view;
    }

    /**
     * @param $viewName
     *
     * @return callable
     */
    private function createGenerator($viewName)
    {
        $mapping = isset($this->mappings[$viewName])
            ? $this->mappings[$viewName]
            : 'phpDocumentor\\Views\\' . $viewName;

        if (is_callable($mapping) === false) {
            if (class_exists($mapping) === false) {
                throw new \RuntimeException(
                    'A mapping in the ViewFactory should either be a callable or refer to a callable class'
                );
            }

            $mapping = new $mapping();
            if (! $mapping instanceof Generator) {
                throw new \RuntimeException('A view generator class should be implement the Generator interface');
            }
        }

        return $mapping;
    }
}
