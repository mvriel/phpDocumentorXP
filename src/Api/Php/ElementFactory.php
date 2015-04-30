<?php

namespace phpDocumentor\Api\Php;

use phpDocumentor\Api\Element;
use phpDocumentor\Api\Fqsen;
use phpDocumentor\Api\Php\Elements as Elements;
use PhpParser\Node\Stmt as PhpParserElements;

final class ElementFactory
{
    /**
     * @param \PhpParser\Node $node
     * @param Element|null    $parent
     *
     * @return Element|null
     */
    public function create(\PhpParser\Node $node)
    {
        switch($node->getType()) {
            case 'Stmt_Namespace':
                return $this->createNamespace($node);
            case 'Stmt_Class':
                return $this->createClass($node);
            case 'Stmt_Interface':
                return $this->createInterface($node);
            case 'Stmt_Trait':
                return $this->createTrait($node);
            case 'Stmt_ClassMethod':
                return $this->createMethod($node);
//            case 'Stmt_Property':
//                return $this->createProperty($node);
            default:
                return null;
        }
    }

    private function createNamespace(PhpParserElements\Namespace_ $namespace)
    {
        $namespaceElement = new Elements\Namespace_(new Fqsen((string)$namespace->name));

        foreach ($namespace->stmts as $node) {
            $child = $this->create($node);

            if ($child instanceof Elements\Namespace_) {
                $namespaceElement->addNamespace($child);
            }
            if ($child instanceof Elements\Function_) {
                $namespaceElement->addFunction($child);
            }
            if ($child instanceof Elements\Constant) {
                $namespaceElement->addConstant($child);
            }
            if ($child instanceof Elements\Class_) {
                $namespaceElement->addClass($child);
            }
            if ($child instanceof Elements\Interface_) {
                $namespaceElement->addInterface($child);
            }
            if ($child instanceof Elements\Trait_) {
                $namespaceElement->addTrait($child);
            }
        }

        return $namespaceElement;
    }

    private function createClass(PhpParserElements\Class_ $class)
    {
        $classElement = new Elements\Class_(new Fqsen((string)$class->namespacedName));

        foreach ($class->stmts as $node) {
            $node->parent = $class;
            $child = $this->create($node);

            if ($child instanceof Elements\Method) {
                $classElement->addMethod($child);
            }
            if ($child instanceof Elements\Property) {
                $classElement->addProperty($child);
            }
        }

        return $classElement;
    }

    private function createInterface(PhpParserElements\Interface_ $interface)
    {
        $interfaceElement = new Elements\Interface_(new Fqsen((string)$interface->namespacedName));

        foreach ($interface->stmts as $node) {
            $node->parent = $interface;
            $child = $this->create($node);

            if ($child instanceof Elements\Method) {
                $interfaceElement->addMethod($child);
            }
        }

        return $interfaceElement;
    }

    private function createTrait(PhpParserElements\Trait_ $trait)
    {
        $traitElement = new Elements\Trait_(new Fqsen((string)$trait->namespacedName));

        foreach ($trait->stmts as $node) {
            $node->parent = $trait;
            $child = $this->create($node);

            if ($child instanceof Elements\Method) {
                $traitElement->addMethod($child);
            }
            if ($child instanceof Elements\Property) {
                $traitElement->addProperty($child);
            }
        }

        return $traitElement;
    }

    private function createMethod(PhpParserElements\ClassMethod $method)
    {
        $fqsenString = (string)$method->parent->namespacedName . '::' . (string)$method->name . '()';
        $method = new Elements\Method(new Fqsen($fqsenString));

        return $method;
    }

    private function createProperty(PhpParserElements\Property $property)
    {
        $fqsenString = (string)$property->parent->namespacedName . '::' . (string)$property->name . '()';
        $property = new Elements\Property(new Fqsen($fqsenString));

        return $property;
    }
}
