<?php
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NameResolver;
use phpDocumentor\Views\ViewFactory;

return [
    // PHP Api Generation
    NodeTraverser::class => DI\object()->method('addVisitor', DI\link(NameResolver::class)),

    // Views
    'views.mappings' => [
        'MyView' => function () { return []; }
    ],
    ViewFactory::class => DI\object()->constructor(DI\link('views.mappings')),

    // Rendering
    Twig_LoaderInterface::class => \DI\object(Twig_Loader_Filesystem::class),
];
