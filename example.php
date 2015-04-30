<?php
/**
 * This is the summary of a file docblock.
 *
 * This is the description for a file docblock.
 */

namespace My
{
    interface AInterface
    {
        public function aMethod();
    }
}

namespace My\Example
{
    use My\AInterface;

    class A implements AInterface
    {

    }
}
