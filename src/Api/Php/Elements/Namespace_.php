<?php

namespace phpDocumentor\Api\Php\Elements;

final class Namespace_ extends BaseElement
{
    private $namespaces = [];
    private $constants = [];
    private $functions = [];
    private $classes = [];
    private $interfaces = [];
    private $traits = [];

    public function addNamespace(Namespace_ $namespace)
    {
        $this->namespaces[] = $namespace;
    }

    public function addConstant(Constant $constant)
    {
        $this->constants[] = $constant;
    }

    public function addFunction(Function_ $function)
    {
        $this->functions[] = $function;
    }

    public function addClass(Class_ $class)
    {
        $this->classes[] = $class;
    }

    public function addInterface(Interface_ $interface)
    {
        $this->interfaces[] = $interface;
    }

    public function addTrait(Trait_ $trait)
    {
        $this->traits[] = $trait;
    }
}
