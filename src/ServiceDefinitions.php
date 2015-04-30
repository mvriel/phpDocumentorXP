<?php
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\HandlerLocator;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\MethodNameInflector;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;
use League\Tactician\Handler\CommandNameExtractor\CommandNameExtractor;

// Commands
use phpDocumentor\Api\Php\GenerateCommand as PhpGenerateCommand;
use phpDocumentor\Api\Php\GenerateHandler as PhpGenerateHandler;
use phpDocumentor\Guides\ReST\GenerateCommand as ReSTGenerateCommand;
use phpDocumentor\Guides\ReST\GenerateHandler as ReSTGenerateHandler;
use phpDocumentor\Template\RenderCommand;
use phpDocumentor\Template\RenderHandler;

// Commands - Actions
use phpDocumentor\Actions\RenderUsingTwig;
use phpDocumentor\Actions\RenderUsingTwigHandler;

// Dependencies
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NameResolver;
use phpDocumentor\Views\ViewFactory;

return [
    // MessageBus
    'command.middlewares' => [
        DI\link(CommandHandlerMiddleware::class)
    ],
    'command.handlers' => [
        PhpGenerateCommand::class  => DI\link(PhpGenerateHandler::class),
        ReSTGenerateCommand::class => DI\link(ReSTGenerateHandler::class),
        RenderCommand::class       => DI\link(RenderHandler::class),
        RenderUsingTwig::class     => DI\link(RenderUsingTwigHandler::class),
    ],
    CommandBus::class => DI\object()->constructor(DI\link('command.middlewares')),

    CommandNameExtractor::class => DI\object(ClassNameExtractor::class),
    HandlerLocator::class       => DI\object(InMemoryLocator::class),
    MethodNameInflector::class  => DI\object(InvokeInflector::class),
    InMemoryLocator::class      => DI\object()->constructor(\DI\link('command.handlers')),

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
